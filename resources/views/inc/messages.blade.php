@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class = "alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(app('request')->input('data'))
    <div class = "alert alert-success">
    Message Sent    
    </div>
@endif

@if(session('error'))
    <div class = "alert alert-success">
        {{session('error')}}
    </div>
@endif
