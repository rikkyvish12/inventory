<?php

namespace App\Http\Controllers;

use App\Models\InOutMaterial;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;

class InOutMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMaterials = InOutMaterial::all();
        $categories = Category::all();

        $materials = Material::all();
        return view('welcome', compact(['allMaterials', 'categories', 'materials']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'category_id' => 'required',
            'material_id' => 'required',
            'date' => 'required',
            'quantity' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        $inOut = new InOutMaterial;
        $inOut->category_id = $request->category_id;
        $inOut->matrial_id = $request->material_id;
        $inOut->date = $request->date;
        $inOut->quantity = $request->quantity;
        $inOut->save();

        return redirect()->back()->with('status', 'Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InOutMaterial  $inOutMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(InOutMaterial $inOutMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InOutMaterial  $inOutMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(InOutMaterial $inOutMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InOutMaterial  $inOutMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InOutMaterial $inOutMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InOutMaterial  $inOutMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(InOutMaterial $inOutMaterial)
    {
        //
    }
}
