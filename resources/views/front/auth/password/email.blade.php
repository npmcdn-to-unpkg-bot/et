@extends('layouts.front')
@section('title', trans('text.profile'))

@section('content')
<div class="login-page">
	{!! Form::open(array('url' => 'password/email', 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			<label class="col-sm-4 control-label">E-Mail Address</label>
			<div class="col-sm-8">
				{!! Form::email('email', '', array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button class="btn btn-primary">{!! trans('text.save') !!}</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection