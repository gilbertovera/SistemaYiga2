<?php

namespace App\Http\Controllers;

use App\Models\CashMov;
use App\Models\CashCategory;
use App\Models\CashBox;
use Illuminate\Http\Request;

class CashMovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashmovs = CashMov::all();
        return view('cashmovs.index', compact('cashmovs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$cashcategories = CashCategory::all();
        $cashcategories_i = CashCategory::query()
                     ->where('type', 'Ingreso')
                     ->get();
        $cashcategories_e = CashCategory::query()
                    ->where('type', 'Egreso')
                    ->get();
        //$cashcategories = CashCategory::pluck('idcashcategories','name','type');
        //$cashcategories = CashCategory::pluck('name', 'idcashcategories');
        /*$sel = $request->input('type');
        $cashcategories = CashCategory::query()
                    ->where('type', 'LIKE', "%{$sel}%")
                    ->get();
                    */
        return view('cashmovs.create', compact('cashcategories_i','cashcategories_e'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'idcashcategories' => 'required'
        ]);

        CashMov::create($request->all());

        return redirect()->route('cashmovs.index')
                        ->with('success', 'Movimiento agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashMov  $cashMov
     * @return \Illuminate\Http\Response
     */
    public function show(CashMov $cashMov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashMov  $cashMov
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashmov = CashMov::find($id);
        $cashcategories_i = CashCategory::query()
            ->where('type', 'Ingreso')
            ->get();
        $cashcategories_e = CashCategory::query()
            ->where('type', 'Egreso')
            ->get();
        
        return view('cashmovs.edit', compact('cashmov','cashcategories_i','cashcategories_e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashMov  $cashMov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'idcashcategories' => 'required'
        ]);
        CashMov::where('idcashmovs', $id)->update($request->except(['_token','_method']));
        /*
        $cashmov = CashMov::findOrFail($id);

        $cashmov->type = $request->get('type');
        $cashmov->idcashcategories = $request->get('idcashcategories');
        $cashmov->date = $request->get('date');
        $cahsmov->description = $request->get('description');
        $cashmov->amount = $request->get('amount');
        
        $cashmov->save();
        */


        return redirect()->route('cashmovs.index')
                        ->with('success', 'Movimiento editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashMov  $cashMov
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashmov = CashMov::find($id);
        $cashmov->delete();

        return redirect()->route('cashmovs.index')
                        ->with('success', 'Movimiento eliminado correctamente');
    }

    public function delete($id)
    {
        $cashmov = CashMov::find($id);

        return view('cashmovs.delete', compact('cashmov'));
    }
}
