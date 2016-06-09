@extends('layouts.front')
@section('title', trans('text.register'))

@section('content')
<div class="login-page">
	{!! Form::open(array('url' => 'auth/register', 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">{{ trans('text.fullname') }}</label>
			<div class="col-sm-9 div-username">
				<div class="col-xs-4">
					{!! Form::text('firstname', '', array('class' => 'form-control', 'placeholder' => trans('text.firstname'))) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::text('middlename', '', array('class' => 'form-control', 'placeholder' => trans('text.middlename'))) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::text('lastname', '', array('class' => 'form-control', 'placeholder' => trans('text.lastname'))) !!}
				</div>
				@if($errors->first('firstname'))
					<span class="help-block error">{!! $errors->first('firstname') !!}</span>
				@endif
				@if($errors->first('lastname'))
					<span class="help-block error">{!! $errors->first('lastname') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.email') }}</label>
			<div class="col-sm-9">
				{!! Form::email('email', '', array('class' => 'form-control')) !!}
				@if($errors->first('email'))
					<span class="help-block error">{!! $errors->first('email') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.password') }}</label>
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
			<label class="col-sm-3 control-label">{{ trans('text.school') }}</label>
			<div class="col-sm-9">
				{!! Form::text('school_name', old('school_name'), array('class' => 'form-control')) !!}
				@if($errors->first('password_confirmation'))
					<span class="help-block error">{!! $errors->first('school_name') !!}</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('agree', 1, false) !!} {!! trans('text.privacy') !!}
					</label>
					@if($errors->first('agree'))
						<span class="help-block error">{!! $errors->first('agree') !!}</span>
					@endif
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection