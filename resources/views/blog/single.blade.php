@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

    <!-- Show Post -->
    <div class="row">
        <div class="col-md-8  col-md-offset-2">
            <h1><a href="{{route('getindex')}}" style="text-decoration: none">&larr;</a>{{$post->title}}</h1>
            <p style="overflow-wrap: break-word;">{{$post->body}}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}<hr/></p>
        </div>
    </div>
   <!-- End Show Post -->
   
    <!--  Show Comments -->
    <div class="row">
        <div class="col-md-8  col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                   <div class="author-info"> 
                       <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" alt="" class="author-image">
                       <div class="author-name">
                           <h4>{{ $comment->name }}</h4>
                           <p class="auther-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
                       </div>
                    </div>
                   <div class="comment-content">
                       {{ $comment->comment }}
                   </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Show Comments -->
   
    <!-- Form for Comments -->
    <div class="row margin-t">
        <div id="comment-form" class="col-md-8  col-md-offset-2">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div> 
           
           
                <div class="col-md-6">
                    {{ Form::label('email', "Email:") }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div> 
            
           
                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control margin-b', 'rows' => '5']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block margin-t']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div> <!-- End Form Comments -->

@endsection