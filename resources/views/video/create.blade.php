@extends('app')

@section('content')

	<h1>Add a video</h1>

	<hr/>

	{!! Form::open(['url' => 'video']) !!}

	<div class="form-group">
	

	{!! Form::label('url','Video Link:') !!}

	{!! Form::text('url',null,['class' =>'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::submit('Share Video') !!}
	</div>


	{!! Form::close() !!}
@stop