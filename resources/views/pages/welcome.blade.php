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
        <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dolores libero odio quibusdam, a explicabo consequatur dolor ducimus alias sapiente eius neque aperiam velit provident facilis obcaecati sed distinctio reprehenderit....</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div> <hr>
        <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dolores libero odio quibusdam, a explicabo consequatur dolor ducimus alias sapiente eius neque aperiam velit provident facilis obcaecati sed distinctio reprehenderit....</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div> <hr>
        <div class="post">
          <h3>Post Heading</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dolores libero odio quibusdam, a explicabo consequatur dolor ducimus alias sapiente eius neque aperiam velit provident facilis obcaecati sed distinctio reprehenderit....</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div><hr>
      </div><!-- col md 8 ends -->
      <div class="col-md-3 col-md-offset-1" >
        <h2>Side Bar</h2>
      </div>
    </div><!-- row ends -->
  @endsection