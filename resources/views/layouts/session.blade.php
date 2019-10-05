<div class="row">
    <div class="col-md-8 offset-md-2">
        @if(Session::has('update'))
            <div class="alert alert-info">
                <strong>Info!</strong> {{ Session::get('update') }}
            </div>
            
        @endif

        @if(Session::has('delete'))
            <div class="alert alert-danger">
                <strong>Danger!</strong> {{ Session::get('delete') }}
            </div>
            
        @endif

        @if(Session::has('create'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ Session::get('create') }}
            </div>
            
        @endif  
    </div>
</div>