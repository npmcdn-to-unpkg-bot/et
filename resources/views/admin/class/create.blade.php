@extends('layouts.admin')
@section('title', 'Bảng điều khiển | '.$submit.' lớp')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            {{$submit}} lớp mới
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">
            Thông tin lớp
        </h4>
        {!! Form::open(array('url' => 'admin/class/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
                        {!! Form::token() !!}
        <div class="form-group">
            <label class="col-md-2 control-label">
                Tên lớp
            </label>
            <div class="col-md-10">
                {!! Form::text('class_name', @$data['class_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên lớp']) !!}
                {!! Form::hidden('class_name_old', @$data['class_name'], ['class' => 'form-control', 'required' => true]) !!}
                @if($errors->first('class_name') )
                    <span class="help-block error">
                        {!! $errors->first('class_name')!!}
                    </span>
                @endif
                @if(@$errunique)
                    <span class="help-block error">
                        {!!$errunique!!}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Mô tả
            </label>
            <div class="col-md-10">
                {!! Form::textarea('class_description', @$data['class_description'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mô tả' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
            </label>
            <div class="col-md-10">
                {!! Form::submit($submit.' lớp', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{url('admin/class')}}">
                    Quay lại
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
