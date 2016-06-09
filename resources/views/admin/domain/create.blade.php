@extends('layouts.admin')
@section('title', 'Bảng điều khiển | '.$submit.' lĩnh vực')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            Thêm lĩnh vực mới
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">
            Thông tin lĩnh vực
        </h4>
        {!! Form::open(array('url' => 'admin/domain/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
        <div class="form-group">
            <label class="col-md-2 control-label">
                Tên lĩnh vực
            </label>
            <div class="col-md-10">
                {!! Form::text('domain_name', @$data['domain_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên lĩnh vực']) !!}
                 {!! Form::hidden('domain_name_old', @$data['domain_name'], ['class' => 'form-control']) !!}
                @if($errors->first('domain_name'))

                <span class="help-block error">
                    {!! $errors->first('domain_name') !!}
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
                {!! Form::textarea('domain_description', @$data['domain_description'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mô tả' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
            </label>
            <div class="col-md-10">
                {!! Form::submit($submit.' lĩnh vực', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{url('admin/domain')}}">
                    Quay lại
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
