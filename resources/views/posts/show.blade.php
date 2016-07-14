@extends('main')

@section('tilte','| View Post')


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{$post->title}} </h1>
	
			<p class="lead"> {{$post->body}} </p>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="{{url($post->slug)}}">{{url($post->slug)}}</a> </p>
				</dl>

				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{date('M j, Y h:ia',strtotime($post->created_at))}}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Update:</label>
					<p>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</p>
				</dl><!-- dl horizontal ends here -->
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}

						{!!Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])!!}

						{!!Form::close()!!}
					</div>
				</div><!-- row ends here -->
			</div><!--  well ends here  -->
		</div><!--  col-md-4 ends  -->
	</div><!--  row ends here }} -->
	
@endsection