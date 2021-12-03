@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	<link rel="stylesheet" href="{{  asset('css/select2.min.css') }}">  

@endsection

@section('content')

  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
  		<hr>
		{!!  Form::open(array('route' => 'posts.store', 'data-parsley-validate' => ''))  !!}
          
  		  	{{ Form::label('title','Title:')}}
            <div class="form-group {{ $errors->has('title') ? ' has-error ' : ''}}">
			  {{ Form::text('title',null,array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
            </div>
		    {{ Form::label('slug', 'Slug:') }}
			<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
				{{ Form::text('slug', null, ['class' => 'form-control', 'required' =>'', 'minlength' => '5', 'maxlength' => '255'])}}
			</div>
			
			{{ Form::label('category_id', 'Category:')}}
			<select class="form-control margin-b" name="category_id">
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			{{ Form::label('tags', 'Tags:')}}
			<select class="form-control select2-multi margin-b" name="tags[]" multiple="multiple">
				@foreach($tags as $tag)
				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				@endforeach

		    </select> 
			

			{{ Form::label('body', "Post Body:")}}
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
      		  {{ Form::textarea('body',null,array('class' => 'form-control', 'required' => ''))}}
            </div>
      		{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block margin-t'))}}

		{!!  Form::close()  !!}

  	</div>
  </div>

@endsection

@section('scripts')

	<script src="{{ asset('js/select2.min.js') }}"></script>  
  	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection 
