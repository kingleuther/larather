@extends('layouts.album')
@section('content')
    <h3>Create Album</h3>
    {!!Form::open(['action'=>'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class = "form-group">
        {{Form::text('name','',['class' => 'form-control','placeholder' => 'Album Name'])}}
    </div>
    <div class = "form-group">    
        {{Form::textarea('description','',['class' => 'form-control','placeholder' => 'Album Description'])}}
    </div>
    <div class = "form-group">        
        {{Form::file('cover_image')}}
        {{Form::submit('submit')}}
    </div>    
    {!! Form::close()!!}

@endsection
