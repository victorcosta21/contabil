<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterClientRequest;
use App\Models\Client;
use App\Models\Months;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Environment;
use App\Models\ExtraInformation;
use App\Models\PaymentControl;


class RegisterClient extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::with('contacts', 'address', 'payment', 'extra')->orderBy('id', 'desc')->paginate(10);
        $data = [];
        foreach($clients as $key => $cli){
            $data[$key] = $cli->payment->where('payment', 1)->sum('ammount');
        }
        $totVal = array_sum($data);

        $filters = $request->filters;

        $clients = Client::with('contacts', 'address', 'payment', 'extra');

        if ($filters) {
            if (isset($filters['name'])) {
                $clients = $clients->where('name', 'like', '%'.$filters['name'].'%');
            }

            if (isset($filters['accountNumber'])) {
                $clients = $clients->where('accountNumber', 'like', '%'.$filters['accountNumber'].'%');
            }

            if (isset($filters['document'])) {
                $clients = $clients->where('document', 'like', '%'.$filters['document'].'%');
            }
        }
        $clients = $clients->paginate(10);

        return view('register.index')->with(compact('clients', 'totVal', 'filters'));
    }

    public function create()
    {   
        $months = Months::all();

        return view('register.create')->with(compact('months'));
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
                'district'          => $addre['district'],
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
                    'cttId'         => $contact['cttId'],
                    'cttName'       => $contact['cttName'],
                    'cttCel'        => $contact['cttCel'],
                    'cttDesc'       => $contact['cttDesc'],
                    'client_id'     => $client['id']
                ]);
            }
            $extr = $request->extra;
            $extra = ExtraInformation::create([
                'informations'      => $extr['informations'],
                'client_id'         => $client['id']
            ]);

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
        $months = Months::all();

        return view('register.edit')->with(compact('client', 'months'));
    }

    public function update(Request $request, $id)
    {
        try {
                \DB::beginTransaction();

                /*Busca pelo client*/
                $client = Client::findOrFail($id);
                $client->update($request->client);

                /*Atualiza os contatos*/
                foreach ($request->contacts as $key => $ctts) {
                    $cttId      = $ctts['cttId'];
                    $cttName    = $ctts['cttName'];
                    $cttCel     = $ctts['cttCel'];
                    $cttDesc    = $ctts['cttDesc'];

                    $data = [
                        'cttId'     => $cttId,
                        'cttName'   => $cttName,
                        'cttCel'    => $cttCel,
                        'cttDesc'   => $cttDesc
                    ];

                    $exist = Contacts::where('client_id', $client->id)
                                        ->where('cttId', $data['cttId'])
                                        ->first();
                    if ($exist) {
                        $exist->update($data);
                        continue;
                    }

                    $contact = Contacts::create([
                        'client_id' => $client->id, 
                        'cttId'     => $data['cttId'], 
                        'cttName'   => $data['cttName'], 
                        'cttCel'    => $data['cttCel'], 
                        'cttDesc'   => $data['cttDesc']]);
                }
                
                /*Atualiza o endereço*/
                $client->address->update($request->address);

                /*Atualiza os pagamentos*/
                foreach ($request->month as $key => $mts) {
                    $ammount = str_replace('.','', $mts['ammount']);
                    $ammount = str_replace(',','.', $ammount);
                    $ammount = (float)$ammount;

                    $month          = $mts['month'];
                    $payment        = $mts['payment'];
                    $dueDate        = $mts['dueDate'];
                    $cpPrevision    = $mts['cpPrevision'];
                    $ammount        = $ammount;
                    $comments       = $mts['comments'];

                    $data = [
                        'month'         => $month ,
                        'payment'       => $payment,
                        'dueDate'       => $dueDate,
                        'cpPrevision'   => $cpPrevision,
                        'ammount'       => $ammount,
                        'comments'      => $comments
                    ];

                    $exist = PaymentControl::where('client_id', $client->id)
                                        ->where('month', $data['month'])
                                        ->first();
                    if ($exist) {
                        $exist->update($data);
                        continue;
                    }

                    $contact = Contacts::create([
                        'client_id'     => $client->id, 
                        'month'         => $data['month'], 
                        'payment'       => $data['payment'], 
                        'dueDate'       => $data['dueDate'], 
                        'cpPrevision'   => $data['cpPrevision'],
                        'ammount'       => $data['ammount'],
                        'comments'      => $data['comments']
                    ]);
                }


                /*Verifica se tem alguma extra informação antes de criar ou atualizar*/
                if (isset($client->extra)) {
                    $client->extra->update($request->extra);
                } else {
                    $extr = $request->extra;
                    ExtraInformation::create([
                        'informations'      => $extr['informations'],
                        'client_id'         => $id
                    ]);
                }

                \DB::commit();
                return redirect()->back()->with('success', 'Atualização realizada com sucesso !!');

            } catch (Exception $e) {
                \DB::rollBack();
                return redirect()->back()->with('error', 'Houve um erro interno.');
            }
    }

    public function destroy($id)
    {
        try {
            \DB::beginTransaction();

            $client = Client::findOrFail($id);
            $client->contacts->each->delete();
            $client->address->delete();
            $client->payment->each->delete();
            $client->extra->delete();
            $client->delete();
                
            \DB::commit();
            return redirect()->back()->with('success', 'Client deletado com sucesso!');

        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro interno.');
        }
    }
}
 