<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Environment;
use App\Models\ExtraInformation;
use App\Models\PaymentControl;

class PainelController extends Controller
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

        return view('painel.index')->with(compact('clients', 'totVal', 'filters'));
    }
}
