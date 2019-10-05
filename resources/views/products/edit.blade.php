@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <form action="{{url('products/'.$product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $message)
                                <span class="text-danger">{{$message}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('stock') ? 'has-error' : ''}}">
                        <label for="">Stock</label>
                        <input type="text" class="form-control" name="stock" value="{{ old('stock', $product->stock)}}">
                        @if($errors->has('stock'))
                            @foreach($errors->get('stock') as $message)
                                <span class="text-danger">{{$message}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group  {{ $errors->has('price') ? 'has-error' : ''}}">
                        <label for="">Precio</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price', $product->price)}}">
                        @if($errors->has('price'))
                            @foreach($errors->get('price') as $message)
                                <span class="text-danger">{{$message}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-info" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection