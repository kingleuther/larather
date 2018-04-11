@extends('layouts.album')
@section('content')
    <h3>Upload Photo</h3>
    {!!Form::open(['action'=>'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class = "form-group">
        {{Form::text('title','',['class' => 'form-control','placeholder' => 'Photo Title'])}}
    </div>
    <div class = "form-group">    
        {{Form::textarea('description','',['class' => 'form-control','placeholder' => 'Photo Description'])}}
        {{Form::hidden('album_id',$album_id)}}
    </div>
    <div class = "form-group">        
        {{Form::file('photo')}}
        {{Form::submit('submit')}}
    </div>    
    {!! Form::close()!!}

@endsection
