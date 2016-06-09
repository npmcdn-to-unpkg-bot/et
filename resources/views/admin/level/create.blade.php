@extends('layouts.admin')
@section('title', 'Bảng điều khiển | '.$submit.' cấp độ')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            {{$submit}} cấp độ mới
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">
            Thông tin cấp độ
        </h4>
        {!! Form::open(array('url' => 'admin/level/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
                        {!! Form::token() !!}
        <div class="form-group">
            <label class="col-md-2 control-label">
                Tên cấp độ
            </label>
            <div class="col-md-10">
                {!! Form::text('level_name', @$data['level_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên cấp độ']) !!}
                {!! Form::hidden('level_name_old', @$data['level_name'], ['class' => 'form-control']) !!}
                @if($errors->first('level_name') )
                    <span class="help-block error">
                        {!! $errors->first('level_name') !!}
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
                {!! Form::submit($submit.' cấp độ', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{url('admin/level')}}">
                    Quay lại
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
