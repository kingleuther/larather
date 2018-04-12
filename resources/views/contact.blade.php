@extends('layouts.album')
@section('content')
<h1>CONTACT</h1>
    <!-- {!! Form::open(['url' => 'contact/submit']) !!} -->
    <div>
        <div>
            <div class = "form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name', 'ng-model' => 'ac.name'])}}
            </div>
            <div class = "form-group">
                {{Form::label('email', 'E-Mail Address')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email', 'ng-model' => 'ac.email'])}}
            </div>
            <div class = "form-group">
                {{Form::label('message', 'Message')}}
                {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Your Message', 'ng-model' => 'ac.message'])}}
            </div>
            <div>
                {{Form::submit('Submit',['class' => 'btn btn-primary', 'ng-click' => 'ac.testClick()'])}}
            </div>
        </div> 
    </div>       
    <!-- {!! Form::close() !!} -->
@endsection
@section('sidebar')
    @parent
    <p>this is appended to the sidebar</p>
@endsection
