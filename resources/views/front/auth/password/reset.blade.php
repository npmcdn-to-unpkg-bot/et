@extends('layouts.front')
@section('title', trans('text.reset_password'))

@section('content')
<div class="login-page">
	@if (count($errors) > 0)
		@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach
    @endif

	{!! Form::open(array('url' => 'password/reset', 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<input type="hidden" name="token" value="{{ $token }}">
		<div class="form-group">
			<label class="col-sm-3 control-label">{!! trans('text.email') !!}</label>
			<div class="col-sm-9">
				{!! Form::email('email', old('email'), array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{!! trans('text.password') !!}</label>
			<div class="col-sm-9">
				{!! Form::password('password', array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{!! trans('text.confirm_password') !!}</label>
			<div class="col-sm-9">
				{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button class="btn btn-primary">{!! trans('text.save') !!}</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection