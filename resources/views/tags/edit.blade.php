@extends('main')

@section('title', "| Edit Tag")
    
@section('content')

    {{ Form::model($tag, ['route'=> ['tags.update', $tag->id], 'method' => "PUT"]) }}

        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control margin-b']) }}

        {{ Form::submit('Save Changes', ['class'=> 'btn btn-success']) }}
    {{ Form::close() }}

@endsection