<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterClientRequest;
use App\Models\Client;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Environment;
use App\Models\ExtraInformation;
use App\Models\PaymentControl;


class RegisterClient extends Controller
{
    public function index()
    {
        $environment = Environment::all();

        return view('register.index')->with(compact('environment'));
    }
    
    public function store(Request $request)
    {   
        try {
                $check = Client::where('accountNumber', $request->client['accountNumber'])->first();
                if ($check) {
                    return redirect()->back()->with('error', 'Este número de conta já existe !!');
                }

            \DB::beginTransaction();
            $client = Client::create($request->client);

            $addre = $request->address;
            $address = Address::create([
                'client_id'         => $client['id'],
                'environment_id'    => $addre['environment'],
                'cep'               => $addre['cep'],
                'number'            => $addre['number'],
                'road'              => $addre['road']  
            ]);

            foreach ($request->month as $key => $mt) {
                $ammount = str_replace('.','', $mt['ammount']);
                $ammount = str_replace(',','.', $ammount);
                $ammount = (float)$ammount;

                $month = PaymentControl::create([
                    'month'         => $mt['month'],
                    'payment'       => $mt['payment'],
                    'dueDate'       => $mt['dueDate'],
                    'cpPrevision'   => $mt['cpPrevision'],
                    'comments'      => $mt['comments'],
                    'ammount'       => $ammount,
                    'client_id'     => $client['id']
                ]);
            }

            foreach ($request->contacts as $key => $contact) {
                $ct = Contacts::create([
                    'cttName'       => $contact['cttName'],
                    'cttCel'        => $contact['cttCel'],
                    'cttDesc'       => $contact['cttDesc'],
                    'client_id'     => $client['id']
                ]);
            }

            \DB::commit();
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso !!');

        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro interno.');
        }

    }

    public function edit($id)
    {
        $client = Client::where('id', $id)->with('contacts', 'address', 'payment', 'extra')->first();

        return view('register.edit')->with(compact('client'));
    }

    public function update($id)
    {
        echo "update"; exit;
    }

    public function destroy($id)
    {
        Client::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Client deletado com sucesso!');
    }
}
