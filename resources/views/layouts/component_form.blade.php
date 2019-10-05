<div class="form-group {{ $errors->has($question->name) ? 'has-error' : ''}}">
    <label for="">{{$question->label}}</label>
    @switch($question->input->name)
        @case('select')
            <select type="{{$question->input->name}}" name="{{$question->name}}" id="{{$question->name}}" class="form-control">
                @foreach($question->options as $option)
                    <option value="{{$option->id}}">{{$option->value}}</option>
                @endforeach
            </select>
            @break
        @case('checkbox')
            @foreach($question->options as $index => $option)
                <div class="checkbox">
                    <label><input name="{{$question->name}}[{{$index}}]" type="checkbox" value="{{$option->id}}">{{$option->value}}</label>
                </div>
            @endforeach
            @break
        @case('radio')
            @foreach($question->options as $option)
                <label class="radio-inline">
                    <input type="radio" name="{{$question->name}}" value="{{$option->id}}"/>
                    {{$option->value}}
                </label>
            @endforeach
            @break
        @default
            <{{$question->type_input->name}} type="{{$question->input->name}}" value="{{old($question->name)}}" name="{{$question->name}}" id="{{$question->name}}" class="form-control"/>
    @endswitch

    @if($errors->has($question->name))
        @foreach ($errors->get($question->name) as $message)
            <span class="text-danger">{{ str_replace($question->name,'',$message) }}</span>
        @endforeach
    @endif
</div>
