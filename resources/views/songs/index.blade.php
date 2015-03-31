@extends('app')

@section('content')
<div class="container">
	{!! Form::open(['method' => 'POST']) !!}
		{!! Form::text('url') !!}
		{!! Form::submit('Share') !!}
	{!! Form::close() !!}

	@foreach($songs as $song)
		<p>{{ $song->url }}</p>
	@endforeach

	{!! $songs->render() !!}
</div>
@endsection