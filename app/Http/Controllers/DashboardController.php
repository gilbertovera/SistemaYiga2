<?php

namespace App\Http\Controllers;
use App\Models\CashMov;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ingresos = CashMov::query()
                    ->where('type', '=', 'Ingreso')
                    ->whereYear('date',date('Y'))
                    ->get();
        //$ingresos_anuales = 0;
        $ingresos_anuales = $ingresos->sum('amount');
        $pruebas = CashMov::query()
                    ->where('type','=','Ingreso')
                    ->select([
                        CashMov::raw('MONTH(date) as month'),
                        CashMov::raw('SUM(amount) as amount')
                    ])
                    ->groupBy('month')
                    ->get();
        $data = [];
      
        foreach ($pruebas as $prueba) {
            $date = Carbon::create(2010,$prueba->month,1);
            $data['month'][] = date('M', strtotime($date));
            $data['data'][] = $prueba->amount;
        }

        
        $egresos = CashMov::query()
                    ->where('type', '=', 'Egreso')
                    ->whereYear('date',date('Y'))
                    ->get();
        $egresos_anuales = $egresos->sum('amount');
        $egresos_m = CashMov::query()
                    ->where('type','=','Egreso')
                    ->select([
                        CashMov::raw('MONTH(date) as month'),
                        CashMov::raw('SUM(amount) as amount')
                    ])
                    ->groupBy('month')
                    ->get();

        foreach ($egresos_m as $egreso) {
            $date = Carbon::create(2010,$egreso->month,1);
            $data['month2'][] = date('M', strtotime($date));
            $data['data2'][] = $egreso->amount;
        }            
        $data['data'] = json_encode($data);
        return view('dashboard.index', $data, compact('ingresos_anuales','egresos_anuales'));
    }
}
