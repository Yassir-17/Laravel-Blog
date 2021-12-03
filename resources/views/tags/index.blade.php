@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- End of .col-md-8 -->
        <div class="col-md-3">
            <div class=" panel-default" style="display: block; position: relative; top: 50px">
                <div class="well">
                    {!! Form::open(['route' => 'tags.store', 'method'=> 'POST'])!!}
                        <h2 class="">New Tag</h2>
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class' => 'form-control margin-b']) }}
                        {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close()!!}
                </div> 
            </div>
        </div>
    </div>

@stop