@extends('main')

@section('title', '| Register')
@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::open()!!}
			
			{{Form::label('name', 'Name:')}}
			{{Form::text('name', null,['class'=>'form-control'])}}

			{{Form::label('email', 'Email:')}}
          	{{Form::email('email', null,['class' => 'form-control'])}}

          	{{Form::label('password','Password:')}}
          	{{Form::password('password',['class' => 'form-control'])}}

          	{{Form::label('password-confirmation','Confirm Password:')}}
          	{{Form::password('password-confirmation',['class' => 'form-control'])}}

			{{Form::submit('Register',['class' =>'btn btn-primary btn-block form-spacing-top'])}}
			<br>
			{!! Form::close()!!}
		</div>
	</div>

@endsection