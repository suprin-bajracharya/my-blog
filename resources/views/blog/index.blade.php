@extends('main')

@section('title', '|Archives')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2" >
		<div class="text-center">
			<h1>Posts</h1>
		</div>
			
		</div>
	</div>
	@foreach($posts as $post)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{$post->title}}</h2>
			<h5>Published:{{ date('M j, Y', strtotime($post->created_at))}}</h5>

			<p>{{substr($post->body, 0,250)}} {{strlen($post->body)>250  ?"..." : ""}} </p>

			<a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="text-center">
				{{$posts->links()}}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<div class="text-center">
			<strong>You are in Page:</strong> {{$posts->currentPage()}} <em>of</em> <strong>{{$posts->lastPage()}}</strong>	
		</div>	
		</div>
	</div>
@endsection