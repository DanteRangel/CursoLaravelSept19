<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Question;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        $form = null;
        return view('users.index', compact('forms', 'form'));
    }

    public function competencia($id) {
        $forms = Form::all();
        $form = Form::find($id);
        return view('users.index', compact('forms', 'form'));

    }

    public function saveCompetencia(Request $request) {
        $form = Form::find($request->id_form);
        $validations = $this->customValidation($form->questions);
        $request->validate($validations);

        $validator = Validator::make($request->all(), $validations);
        return response()->json($validator->errors(), 200);
    }


    public function customValidation($questions) {
        $validations = [];
        foreach($questions as $question) {
            $validations[$question->name] = ($question->required) ? 'required|' . $question->validations : $question->validations;
        }
        return $validations;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
