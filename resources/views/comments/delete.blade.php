@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1><a href="{{ route('posts.show', $comment->post->id) }}">&larr;</a> DELETE THIS COMMENT?</h1>
            <p class='margin-t'>
                {{-- <strong>Name:</strong>{{ $comment->name }}<br>
                <strong>Email:</strong>{{ $comment->email }}<br> --}}
                <strong>Comment:</strong class="margin-t">{{ $comment->comment }}<br>
            </p>
            {{ Form::open(['route'=> ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                {{ Form::submit('YES', ['class' => 'btn btn-lg btn-block btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection