@extends('main')

@section('title', "| $post->title")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/'. $post->image) }}" alt="{{ asset('images/'. $post->image) }}" height="400" width="400">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
			@foreach( $post->comments as $comment )
				<div class="comment">
					<div class="author-info">

						<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email))). "?s=50&d=retro" }}" alt="" class="author-image">
						<div class="author-name">
							<h4>{{$comment->name}} </h4>
							<p class="author-time">{{date('F ns, Y - g:iA'), strtotime($comment->created_at) }}</p>
						</div>
						
					</div> 
					<div class="comment-content">
						{{ $comment->comment }}
					</div>

					
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2 btn-h1-spacing">
			{{Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
				<div class="col-md-6">
					{{Form::label('name', "Name:")}}
					{{Form::text('name', null, ['class' => 'form-control'])}}
				</div>
				<div class="col-md-6">
					{{Form::label('email', "Email:")}}
					{{Form::text('email', null, ['class' => 'form-control'])}}
				</div>
				<div class="col-md-12">
					{{Form::label('comment', "Comments:")}}
					{{Form::textarea('comment', null, ['class' => 'form-control'])}}

					{{Form::submit('Add Comment',['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
				</div>
			{{Form::close()}}
		</div>
	</div>


@endsection