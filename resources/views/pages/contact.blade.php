@extends('main')
@section('title','|Contact us')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Contact Me</h1>
        <hr>
        <form action="" >
          <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" id="subject" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Message:</label>
          <textarea name="message" id="message" cols="30" rows="10" class="form-control">Message here</textarea>
        </div>
        <input type="submit" class="btn btn-success">
        </form>
        
      </div>
    </div><!-- row ends -->
@endsection