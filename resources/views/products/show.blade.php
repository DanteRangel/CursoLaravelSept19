@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <label for="">Nombre: {{$product->name}} </label><br>
            <label for="">Price: {{$product->price}} </label><br>
            <label for="">Stock: {{$product->stock}} </label>
            <a class="btn btn-success" href="{{route('products.edit', ['product' => $product])}}" for="">Editar</a>
        </div>
    </div>
@endsection