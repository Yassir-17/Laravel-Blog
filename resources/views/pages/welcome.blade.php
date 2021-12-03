@extends('main')

@section('title', '| Homepage')

@section('content')
    <div class="row">
      <div class="col- md-12">
        <div class="jumbotron">
          <ul>
            @foreach($errors->all() as $error)

              <li>{{$error}}</li>

            @endforeach
          </ul>
          <h1 class="display-4">Welcome to My Blog!</h1>
          {{-- {!! Form::open(['files' => true, 'url'=> 'upload/file']) !!}
            {!! Form::textarea('test') !!}
              {!! Form::submit('upload') !!}
          {!! Form::close() !!} --}}
          <p class="lead">Thank you so much for  visiting . This is my test website built with Laravel. Please read my popular post!</p>
          <p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p> 
        </div>
      </div>
    </div> <!-- end of header .row-->
    <div class="row">
      <div class="col-md-8">
        @foreach ($posts as $post)
          <div class="post">
            <h3>{{$post->title}}</h3>
            <p style="overflow-wrap: break-word;">
              {{substr($post->body,0,300)}}{{strlen($post->body) > 300 ? "..." : "."}}
            </p>
            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
          </div>
          <hr/>
        @endforeach
      </div>
      <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
      </div>
   </div>


@endsection


