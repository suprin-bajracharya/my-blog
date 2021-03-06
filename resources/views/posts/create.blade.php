@extends('main')

@section('title', '| Create New Post')

@section('stylesheet')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code'
		});
	</script>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate'=> '', 'files' => 'true')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required'=> '', 'maxlength' => '255', 'minlength' => '2', 'placeholder' => 'Title of the post')) }}

				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required'=> '', 'maxlength' => '255', 'minlength' => '2', 'placeholder' => 'Slug of the post' )) }}
				{{Form::label('category_id', 'Category:')}}
				<select name="category_id" id="" class="form-control" >
					@foreach($categories as $category)
						<option value='{{$category->id}}'>{{$category->name}}</option>
					@endforeach
				</select>

				{{Form::label('tags', 'Tags:')}}
				 <select name="tags[]" id="" class="form-control select2-multi"  multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>

				{{Form::label('feature_image', 'Upload image')}}
				{{Form::file('feature_image')}}

				{{ Form::label('body', "Post Body:") }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Type your article here')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection