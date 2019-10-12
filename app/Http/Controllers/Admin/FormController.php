<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Form;
use App\Http\Controllers\Controller;
use App\Input;
use Session;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $forms = Form::all();
        return view('competencias.admin.index', compact('forms'));
    }

    public function show($id) {
        return 'este es un reporte';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs = Input::all();
        return view('competencias.admin.create', compact('inputs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id);
        $inputs = Input::all();
        return view('competencias.admin.show', compact('form', 'inputs'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Form::find($id)->name;
        Form::destroy($id);
        Session::flash('delete', 'Se ha eliminado la competencia ' . $name);
        return redirect('admin/comperencia');
    }
}
