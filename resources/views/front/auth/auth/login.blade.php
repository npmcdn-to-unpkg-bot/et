@extends('layouts.front')
@section('title', trans('text.login'))

@section('content')
<div class="login-page">
	@if($errors->first('alert-danger'))
		<p class="alert alert-danger">{!! $errors->first('alert-danger') !!}</p>
	@endif
	@if($errors->first('alert-success'))
		<p class="alert alert-success">{!! $errors->first('alert-success') !!}</p>
	@endif
	{!! Form::open(array('url' => 'auth/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				{!! Form::email('email', '', array('class' => 'form-control', 'placeholder' => trans('text.email'))) !!}
				@if($errors->first('email'))
					<span class="help-block error">{!! $errors->first('email') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				{!! Form::password('password', array('class' => 'form-control')) !!}
				@if($errors->first('password'))
					<span class="help-block error">{!! $errors->first('password') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('remember_me', 1, false) !!} {!! trans('text.remember_me') !!}
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Sign in</button>
				<a href="{!! url('password/email') !!}">{{ trans('text.forgot_pass') }}</a>
			</div>
		</div>
	{!! Form::close() !!}
	<p><a href="{!! url('auth/register') !!}">{{ trans('text.register') }}</a></p>
</div>
@endsection