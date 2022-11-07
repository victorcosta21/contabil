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

        $search = $request->all();
        
        if ($search) {
            $clients = Client::with('contacts', 'address', 'payment', 'extra')->where([
                ['name', 'like', '%'.$search['name'].'%'],
                ['accountNumber', 'like', '%'.$search['accountNumber'].'%'],
                ['document', 'like', '%'.$search['document'].'%'],
            ])->orderBy('id', 'desc')->paginate(1);
        } else{
            $clients = Client::with('contacts', 'address', 'payment', 'extra')->orderBy('id', 'desc')->paginate(1);
        }

        return view('painel.index')->with(compact('clients', 'totVal', 'search'));
    }
}
