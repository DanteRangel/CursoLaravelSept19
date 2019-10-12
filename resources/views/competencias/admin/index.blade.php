@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 text-right">
            <a class="btn btn-success" href="{{url('admin/competencia/create')}}">Crear nueva competencia</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 offset-md-2 table-response">
            <table class="table table-striped">
                <thead class="text-center">
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th colspan="3">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{$form->name}}</td>
                            <td>{{$form->description}}</td>
                            <td>
                                    <a href="{{url('admin/competencia/'.$form->id)}}" class="btn btn-dark">Reporte</a>                            
                            </td>
                            <td>
                                <a href="{{url('admin/competencia/'.$form->id. '/edit')}}" class="btn btn-info">Editar</a>                            
                            </td>
                            <td>
                                <form method="POST" action="{{ url('admin/competencia/'. $form->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection