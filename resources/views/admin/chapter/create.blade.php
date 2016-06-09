@extends('layouts.admin')
@section('title', 'Bảng điều khiển | '.$submit.' chương')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ul class="breadcrumb">
        <li>
            <a href="{{url('admin')}}">
                Bảng điều khiển
            </a>
        </li>
        <li>
            <a href="{{url('admin/chapter')}}">
                Quản lý chương
            </a>
        </li>
        <li class="active">
            {{$submit}} chương
        </li>
    </ul>
    <div class="container-fluid">
        <div class="clear10">
        </div>
        <div class="row">
{!! Form::open(array('url' => 'admin/chapter/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
                        {!! Form::token() !!}
        <div class="form-group">
            <label class="col-md-2 control-label">
                Tên chương
            </label>
            <div class="col-md-10">
                {!! Form::text('chapter_name', @$data['chapter_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên chương']) !!}
                {!! Form::hidden('chapter_name_old', @$data['chapter_name'], ['class' => 'form-control']) !!}
                @if($errors->first('chapter_name') )
                    <span class="help-block error">
                        {!! $errors->first('chapter_name') !!}
                    </span>
                @endif
                 @if(@$errunique)
                    <span class="help-block error">
                        {!!@$errunique!!}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
            </label>
            <div class="col-md-10">
                {!! Form::submit($submit.' chương', ['class' => 'btn btn-success']) !!}
                <a class="btn btn-warning" href="{{url('admin/chapter')}}">
                    Quay lại
                </a>
            </div>
        </div>
        {!! Form::close() !!}
</div>
@endsection
