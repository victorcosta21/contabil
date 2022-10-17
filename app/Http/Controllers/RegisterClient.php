<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

            $client = Client::create($request->client);

            $addre = $request->address;
            $address = Address::create([
                'client_id'         => $client['id'],
                'environment_id'    => $addre['environment'],
                'cep'               => $addre['cep'],
                'number'            => $addre['number'],
                'road'              => $addre['road'],
                'complement'        => $addre['complement'],
                'reference'         => $addre['reference']
            ]);

            foreach ($request->contacts as $key => $contact) {
                $ct = Contacts::create([
                    'cttName'       => $contact['cttName'],
                    'cttCel'        => $contact['cttCel'],
                    'cttDesc'       => $contact['cttDesc'],
                    'client_id'     => $client['id']
                ]);
            }

            foreach ($request->month as $key => $mt) {
                $month = PaymentControl::create([
                    'month'         => $mt['month'],
                    'payment'       => $mt['payment'],
                    'dueDate'       => $mt['dueDate'],
                    'cpPrevision'   => $mt['cpPrevision'],
                    'comments'      => $mt['comments'],
                    'client_id'     => $client['id']
                ]);
            }
            $etx = $request->extra;
            $extra = ExtraInformation::create([
                'informations'      => $etx['informations'],
                'client_id'         => $client['id']
            ]);
        } catch (Exception $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
        }

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso !!');
    }
}
