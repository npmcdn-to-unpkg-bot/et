@extends('layouts.front')
@section('title', trans('text.profile'))

@section('content')
<div class="login-page">
	@if(Session::has('successMsg'))
		<p class="alert alert-success">{{ Session::get('successMsg') }}</p>
	@endif
	
	@if(isset($user))
		{!! Form::model($user, ['url' => 'profile/index', 'method' => 'patch', 'class' => 'form-horizontal']) !!}
	@else
		{!! Form::open(array('url' => 'profile/index', 'method' => 'post', 'class' => 'form-horizontal')) !!}
	@endif
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">{{ trans('text.fullname') }}</label>
			<div class="col-sm-9 div-username">
				<div class="col-xs-4">
					{!! Form::text('firstname', old('firstname'), array('class' => 'form-control', 'placeholder' => trans('text.firstname'))) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::text('middlename', old('middlename'), array('class' => 'form-control', 'placeholder' => trans('text.middlename'))) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::text('lastname', old('middlename'), array('class' => 'form-control', 'placeholder' => trans('text.lastname'))) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.birthday') }}</label>
			<div class="col-sm-9 div-username">
				<div class="col-xs-4">
					{!! Form::selectRange('day', 01, 31, '', ['class' => 'form-control']) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::selectMonth('month', '', ['class' => 'form-control']) !!}
				</div>
				<div class="col-xs-4">
					{!! Form::selectRange('year', 1950, 2012, '', ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.classes') }}</label>
			<div class="col-sm-9 div-username">
				<div class="col-xs-4">
					{!! Form::select('classes_id', $classIds, old('classes_id'), ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ trans('text.school') }}</label>
			<div class="col-sm-9 div-username">
				{!! Form::text('school_name', old('school_name'), array('class' => 'form-control')) !!}
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