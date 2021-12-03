@extends('main')

@section('title', '| View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>
				<a href="{{route('posts.index')}}" style= "text-decoration: none">&larr;</a>
				{{$post->title}}
			</h1>
			<p class="lead" style="overflow-wrap: break-word;">
				{{$post->body}}
			</p>
			<hr>
			<div class="tags margin-b">
			@foreach ($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach	
			</div>

			<!-- Start show Comments-->
			<div id="backend-comments" style="margin-top: 50px">
				<h3>Comments <small> {{ $post->comments()->count() }} total</h3>
			</div>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
					    <th>Email</th>
					    <th>Comment</th>
					    <th width="70px"></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($post->comments as $comment)
					<tr>
						<td>{{  $comment->name }}</td>
						<td>{{  $comment->email }}</td>
						<td>{{  $comment->comment }}</td>
						<td>
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-denger"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- End show Comments-->
			
			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}" style="text-decoration: none">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{date('M j, Y h:ia',strtotime($post->created_at))}}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</p>
				</dl>
				
			</div>
			
				<div class="row">

					<div class="col-md-4 " style="margin-bottom: 10px">
						
						<a 
							href="{{route('posts.edit', $post->id)}}"
							class=" btn btn-primary btn-lg btn-block">
							Edit
						</a>
					</div>
					<div class="col-md-4">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => ' btn btn-danger btn-lg btn-block', 'style' => 'margin-bottom: 30px'])}}
	
							{{-- <a
							href="{{route('posts.destroy', $post->id)}}"
							class="btn btn-danger btn-block btn-lg"
							style="margin-bottom: 30px">
							Delete
							</a> --}}
						{!! Form::close() !!}
					</div>
				</div>
			
		</div>
	</div>
@endsection()