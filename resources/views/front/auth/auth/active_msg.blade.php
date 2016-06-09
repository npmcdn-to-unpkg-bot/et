@extends('layouts.front')
@section('title', trans('text.activation'))

@section('content')
<div class="">
	@if(Session::has('fail'))
		<p>{!! Session::get('fail') !!}</p>
	@endif
	
	@if(Session::has('done'))
		<p>{!! Session::get('done') !!}</p>
	@endif
</div>
@endsection