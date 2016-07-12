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
					<dt>Create At:</dt>
					<dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Update:</dt>
					<dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
				</dl><!-- dl horizontal ends here -->
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
				</div><!-- row ends here -->
			</div><!--  well ends here  -->
		</div><!--  col-md-4 ends  -->
	</div><!--  row ends here }} -->
	
@endsection