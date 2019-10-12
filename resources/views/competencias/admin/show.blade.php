@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Editar Formulario</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" value="{{old('name', $form->name)}}">
            </div>
            <div class="form-group">
                <label for="">Descripcion</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{old('description', $form->description)}}">
            </div>
        </div>
    </div>
    
    
@endsection