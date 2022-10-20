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
    public function index()
    {
        $clients = Client::with('contacts')->with('address')->with('payment')->with('extra')->orderBy('id', 'desc')->paginate(10);

        return view('painel.index')->with(compact('clients'));
    }
}
