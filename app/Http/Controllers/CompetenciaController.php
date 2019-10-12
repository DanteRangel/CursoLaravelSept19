<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\AuditForm;
use App\Form;
use App\Period;
use App\Question;
use Session;
use Auth;
class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        $period = $this->getPeriod();
        $id_user = Auth::user()->id;
        $success_forms = AuditForm::where([
            'id_user' => $id_user,
            'period' => $period
        ])->pluck('id_form')->toArray();
        $form = null;
        return view('competencias.index', compact('forms', 'form', 'success_forms'));
    }

    public function show($id) {
        $forms = Form::all();
        $form = Form::find($id);
        $id_user = Auth::user()->id;
        $period = $this->getPeriod();
        $success_forms = AuditForm::where([
            'id_user' => $id_user,
            'period' => $period
        ])->pluck('id_form')->toArray();

        return view('competencias.index', compact('forms', 'form', 'success_forms'));

    }

    public function store(Request $request) {
        $form = Form::find($request->id_form);
        $validations = $this->customValidation($form->questions);
        // $request->validate($validations);
        $period = $this->getPeriod();

        $id_period = Period::where('name', $period)->get()->first()->id;
        $id_user = Auth::user()->id;
        $question_names = $request->except(['id_form', '_token']);
        
        $questions = Question::select('id', 'name')->whereIn('name', array_keys($question_names))->get()->toArray();

        foreach($questions as $question){
            $answer = $question_names[$question['name']];
            if(is_array($answer)) {
                foreach($answer as $a) {
                    Answer::create([
                        'id_user' => $id_user,
                        'id_period' => $id_period,
                        'id_question' => $question['id'],
                        'answer' => $a
                    ]);
                }
            } else {
                Answer::create([
                    'id_user' => $id_user,
                    'id_period' => $id_period,
                    'id_question' => $question['id'],
                    'answer' => $answer
                ]);
            }
            
        }
        AuditForm::create([
            'id_form' => $form->id,
            'id_user' => $id_user,
            'period' => $period
        ]);
        
        Session::flash('create', 'Se ha guardado satisfactoriamente la competencia');
        return redirect('competencia');
    }


    public function customValidation($questions) {
        $validations = [];
        foreach($questions as $question) {
            $validations[$question->name] = ($question->required) ? 'required|' . $question->validations : $question->validations;
        }
        return $validations;
    }

    public function getPeriod(){
        $anio = date('Y');
        $mes = date('n');
        $semester = '1';
        if($mes > 6) {
            $semester = '2';
        }
        
        return $anio . '-' . $semester;
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
