@extends('layouts.app')

@section('content')
    <form action="{{url('admin/competencia')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Nueva competencia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{old('description')}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a class="btn btn-info" id="btnAdd">Agregar pregunta</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center mt-3" id="questions">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center mt-3">
                <button style="width:60%;" type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        var a = 0;
        var inputs = @json($inputs);
        console.log(inputs);
        $( document ).ready(function() {
            $('#btnAdd').click(function(e){
                e.preventDefault();
                html = "<div id=´div_question_" + a + "'>";
                html +=     "<h3> Configura la pregunta " + (a + 1) + "</h3>";
                html +=     '<div class="form-group">';
                html +=         '<label>Nombre de campo</label>';
                html +=         '<input class="form-control" name="name_question[' + a + ']" type="text">';
                html +=     '</div>';
                html +=     '<div class="form-group">';
                html +=         '<label>Tipo de pregunta</label>';
                html +=         '<select class="form-control" id="select_change_'+ a + '" onclick="select_change('+ a +')"  name="type_question[' + a + ']">';
                for (let key in inputs) {
                    html +=             '<option value="' + inputs[key].id + '">' + inputs[key].name + '</option>'
                }
                html +=         '</select>';
                html +=     '</div>';
                html += "</div><br><hr>";
                $('#questions').append(html);
                a++;
            });
        });
        function select_change(key) {
            select = $('#select_change_' + key );
            valor = select.val();
            multiples = [2, 23, 13];
            if(multiples.indexOf(parseInt(valor)) != -1 ){
                html = addOption(key);
                console.log(html);
                $('#div_question_' + key).append(html);
            }
            
        };

        function addOption(key) {
            html =     '<div class="form-group">';
            html +=         '<label>Valor</label>';
            html +=         '<input class="form-control" name="value[' + key + '][]" type="text">';
            html +=     '</div>';
            return html;
        }

    </script>
@endsection