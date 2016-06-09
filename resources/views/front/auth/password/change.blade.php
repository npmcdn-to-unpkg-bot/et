@extends('layouts.front')
@section('title', trans('text.changepass'))

@section('content')
<div class="login-page">
	@if(Session::has('alert-success'))
		<p class="alert alert-success">{!! Session::get('alert-success') !!}</p>
	@endif
	{!! Form::open(array('url' => 'password/change', 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">{!! trans('text.old_password') !!}</label>
			<div class="col-sm-9">
				{!! Form::password('old_password', array('class' => 'form-control')) !!}
				@if($errors->first('old_password'))
					<span class="help-block error">{!! $errors->first('old_password') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{!! trans('text.new_password') !!}</label>
			<div class="col-sm-9">
				{!! Form::password('password', array('class' => 'form-control')) !!}
				@if($errors->first('password'))
					<span class="help-block error">{!! $errors->first('password') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.confirm_password') }}</label>
			<div class="col-sm-9">
				{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
				@if($errors->first('password_confirmation'))
					<span class="help-block error">{!! $errors->first('password_confirmation') !!}</span>
				@endif
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button class="btn btn-primary">{!! trans('text.changepass') !!}</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection