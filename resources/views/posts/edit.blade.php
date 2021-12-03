@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

	<link rel="stylesheet" href="{{  asset('css/select2.min.css') }}">  

@endsection

@section('content')
    <div class="row">
		{!! Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT']) !!}
			<div class="col-md-8 col-md-offset-2">
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, ["class" => 'form-control input-lg', "style" => 'margin-bottom: 30px']) }}
				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, ["class" => 'form-control ', "style" => 'margin-bottom: 30px']) }}
				
				{{ Form::label('category_id', "Category:") }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control margin-b'])}}
				
				{{ Form::label('tags', "Tags:") }}
				{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi margin-b form-control', 'multiple' => 'multiple'])}}
				

				{{ Form::label('body', 'Body:') }}
				{{ Form::textarea('body', null, ["class" => 'form-control', "style" => 'margin-bottom: 13px']) }}
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block margin-b">Cancel</a>
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
							{{-- <a href="{{route('posts.update', $post->id)}}" class="btn btn-success btn-block">Save</a> --}}
					</div>
				</div>
			</div> 
			</div>
		{!! Form::close() !!}
    </div> <!--end of .row (form)-->
@endsection

@section('scripts')

	<script src="{{ asset('js/select2.min.js') }}"></script>  
	<script type="text/javascript">
	$('.select2-multi').select2();
	</script>
@endsection 
{{-- // $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change'); --}}
