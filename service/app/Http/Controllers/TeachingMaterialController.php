<?php

namespace App\Http\Controllers;

use App\Models\TeachingMaterial;
use Illuminate\Http\Request;
use App\Http\Requests\TeachingMaterialRequest;
use Illuminate\Support\Facades\Auth;

class TeachingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teaching_materials=TeachingMaterial::where("user_id",[Auth::id()])->get();
        return view("TeachingMaterial.index",['teaching_materials'=>$teaching_materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TeachingMaterial.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachingMaterialRequest $request)
    {
        $teaching_material=$request->all();
        $form=new TeachingMaterial;
        unset($teaching_material["_token"]);
        $form->fill($teaching_material)->save();
        return redirect(route("teaching_material.show",[$form->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachingMaterial  $teachingMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(TeachingMaterial $teaching_material)
    {
        $teaching_material=TeachingMaterial::find($teaching_material)->first();
        $param=compact("teaching_material");
        return view("TeachingMaterial.show",$param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachingMaterial  $teachingMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingMaterial $teaching_material)
    {
        $form=TeachingMaterial::find($teaching_material)->first();
        return view ("TeachingMaterial.edit",["form"=>$form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachingMaterial  $teachingMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(TeachingMaterialRequest $request, $teaching_material)
    {
        $form=TeachingMaterial::find($teaching_material);
        $teaching_material=$request->all();
        unset($teaching_material['_token']);
        $form->fill($teaching_material)->save();
        return redirect(route('teaching_material.show',["teaching_material"=>$form->id]));
    }

    public function del_conform($teaching_material){
        $teaching_material=TeachingMaterial::find($teaching_material)->first();
        return view("TeachingMaterial.del_conform",["teaching_material"=>$teaching_material]);
    }
    public function destroy(TeachingMaterial $teaching_material)
    {
        TeachingMaterial::find($teaching_material->id)->delete();
        return redirect(route('teaching_material.index'));
    }
}
