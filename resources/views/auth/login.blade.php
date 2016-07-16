@extends('main')

@section('title', '|Login')


@section('content')
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          {!!Form::open() !!}
      
          {{Form::label('email', 'Email:')}}
          {{Form::email('email', null,['class' => 'form-control'])}}

          {{Form::label('password', 'Password:')}}
          {{Form::password('password', ['class' => 'form-control'])}}

          {{Form::checkbox('remember')}}{{Form::label('remember', "Remember Me")}}
          <hr>
          {{Form::submit('Sign In',['class' =>'btn btn-primary btn-block'])}}

          <br>
          <a href="{{url('password/reset')}}" > Forgot password</a>


          {!!Form::close()!!}
        </div>
      </div>

@endsection
    
    
    
    
 