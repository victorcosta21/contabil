<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Spending;

class ManagementController extends Controller
{
    public function index()
    {
        $spendings = Spending::get();
        $day = Carbon::now();
        $week = $day->subDays(7);
        $month = $day->subDays(30);

        $countDay = Spending::where('created_at', '>', $day)->sum('money');
        $countWeek = Spending::where('created_at', '>', $week)->sum('money');
        $countMonth = Spending::where('created_at', '>', $month)->sum('money');

        return view('management.index')->with(compact('spendings', 'countDay', 'countWeek', 'countMonth'));
    }

    public function create()
    {   
        $today = Carbon::now();

        return view('management.create')->with(compact('today'));
    }

    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $spending = $request->all();

            $money = str_replace('.','', $spending['money']);
            $money = str_replace(',','.', $money);

            $data = [   
                'type'          => $spending['type'],
                'description'   => $spending['description'],
                'date'          => $spending['date'],
                'money'         => $money
            ];
            Spending::create($data);

            \DB::commit();
            return redirect()->back()->with('success', 'Despesa adicionada com sucesso !!');
        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro interno.');
        }
    }

    public function edit($id)
    {   
        $spending = Spending::findOrFail($id);

        return view('management.edit')->with(compact('spending'));
    }

    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $spending = Spending::findOrFail($id);
            $request = $request->all();

            $money = str_replace('.','', $request['money']);
            $money = str_replace(',','.', $money);

            $data = [   
                'type'          => $request['type'],
                'description'   => $request['description'],
                'date'          => $request['date'],
                'money'         => $money
            ];
            $spending->update($data);

            \DB::commit();
            return redirect()->back()->with('success', 'Despesa atualizada com sucesso !!');
        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro interno.');
        }
    }

    public function destroy($id)
    {
        try {
            \DB::beginTransaction();

            $spending = Spending::findOrFail($id);
            $spending->delete();
                
            \DB::commit();
            return redirect()->back()->with('success', 'Despesa deletada com sucesso!');

        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro interno.');
        }
    }
}
