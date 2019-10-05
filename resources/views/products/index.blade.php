@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="table-response">
                <table class="table table-striped">
                    <thead>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr id="tr_{{$product->id}}">
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('products/'.$product->id) }}">Ver</a>
                                    <form method="POST" action="{{ url('products/'. $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <button class="btn btn-danger" onclick="deleteItem({{$product->id}})">Eliminar 2</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @foreach($questions as $question)
                <div class="form-group">
                    <label for="">{{$question->label}}</label>
                    <{{$question->type_input->name}} type="{{$question->input->name}}" name="{{$question->name}}" id="{{$question->name}}" class="form-control"/>
                </div>
            @endforeach
        </div>
        <div class="col-md-2">
            <a href="{{ url('products/create')}}" class="btn btn-success">Agregar</a>
        </div>
    </div>   
@endsection

@section('js')
    <script>
        function deleteItem(id) {
            $('#tr_' + id).hide('slow');
            $.ajax({
                url: "{{url('products')}}/" + id,
                data: {
                    '_token': "{{ csrf_token() }}",
                    '_method': 'DELETE'
                },
                method: 'POST',
                success: function(response) {
                    $('#tr_' + id).remove();
                }
            });
        }
    </script>
@endsection