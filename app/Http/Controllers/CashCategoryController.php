<?php

namespace App\Http\Controllers;
use App\Models\CashCategory;

use Illuminate\Http\Request;

class CashCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashcategories = CashCategory::paginate(5);
        return view('cashcategories.index', compact('cashcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashcategories.create');
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
            'name' => 'required|unique:cash_categories',
            'description' => 'required',
            'type' => 'required'
        ]); 

        CashCategory::create($request->all());

        return redirect()->route('cashcategories.index')
                        ->with('success', 'Categoría agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashCategory  $cashCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CashCategory $cashCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashCategory  $cashCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashcategory = CashCategory::find($id);
        return view('cashcategories.edit', compact('cashcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashCategory  $cashCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cashcategory = CashCategory::find($id);

        $cashcategory->name = $request->get('name');
        $cashcategory->description = $request->get('description');
        $cashcategory->type = $request->get('type');

        $cashcategory->save();

        return redirect()->route('cashcategories.index')
                        ->with('success', 'Categoría editada correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashCategory  $cashCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashcategory = CashCategory::find($id);
        $cashcategory->delete();

        return redirect()->route('cashcategories.index')
                        ->with('success', 'Categoría eliminada correctamente');
    }

    public function delete($id)
    {
        $cashcategory = CashCategory::find($id);

        return view('cashcategories.delete', compact('cashcategory'));
    }
}
