<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = material::all();
        $material_update = false;
        return view('material', compact(['materials', 'material_update']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'opening_balance' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        $material =new Material;
        $material->name = $request->name;
        $material->opening_balance = $request->opening_balance;
        $material->save();

        return redirect()->back()->with('status', 'Material created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material_update = Material::find($id);
        $materials = Material::all();
        return view('material', compact(['materials', 'material_update']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'opening_balance' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/'
        ]);


        $material = Material::find($id);
        $material->name = $request->name;
        $material->opening_balance = $request->opening_balance;
        $material->update();

        return redirect()->back()->with('status', 'Material updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return redirect()->back()->with('status', 'Material deleted Successfully');
    }
}
