@extends('main')


@section('title','|Home')
@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1>Welcome to My Blog!</h1>
          <p class="lead">Thank You for visiting.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a></p>
        </div><!-- jumbotron ends -->
      </div><!-- col md 12 ends -->
    </div><!-- row ends -->

    <div class="row">
      <div class="col-md-8">
      @foreach($posts as $post)
        <div class="post">
          <h3>{{$post->title}}</h3>
          <p>{{substr($post->body, 0, 30)}} {{strlen($post->body)>30?"..." : ""}} </p>
          <a href="{{url('blog/'.$post->slug)}} " class="btn btn-primary">Read More</a>
        </div> <hr>
      @endforeach  

        
      </div><!-- col md 8 ends -->
      <div class="col-md-3 col-md-offset-1" >
        <h2>Side Bar</h2>
      </div>
    </div><!-- row ends -->
  @endsection