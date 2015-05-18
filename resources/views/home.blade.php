@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<div class="popover-markup">
					    <a href="#" class="trigger btn btn-default">Popover link</a>
					    <div class="head hide">Lorem Ipsum</div>
					    <div class="content hide">
					        <div class="form-group">
					            <input
					                type="text"
					                class="form-control"
					                placeholder="Type something…">
					        </div>
					        <button type="submit" class="btn btn-default btn-block">
					            Submit
					        </button>
					    </div>
					</div>

					<br>

					<div class="popover-markup">
					    <a href="#" class="trigger btn btn-default">Popover link II</a>
					    <div class="head hide">Lorem Ipsum II</div>
					    <div class="content hide">
					        <div class="form-group">
					           <input
					                type="text"
					                class="form-control"
					                placeholder="Type something II…">
					        </div>
					        <button type="submit" class="btn btn-default btn-block">
					            Submit
					        </button>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
