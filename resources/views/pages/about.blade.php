@extends('main')

@section('title', '| About')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>About Me</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam officiis autem at impedit, distinctio quod doloremque
          sint inventore quos esse amet praesentium dolores perferendis fugiat optio. Exercitationem eaque ducimus quia.
          <p>My Name is:{{ $data['name'] }} </p>
          <p>Email:{{ $data['email'] }} </p>
        </p>
      </div>
    </div>
 @endsection