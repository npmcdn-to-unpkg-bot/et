@extends('layouts.admin')

@section('title', 'Bảng điều khiển | '.$submit.' người dùng')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            {{$submit}} người dùng
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">
            Thông tin người dùng
        </h4>
        {!! Form::open(array('url' => 'admin/user/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
        {!! Form::token() !!}
        {!! Form::hidden('id', @$data['id'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Họ ...']) !!}
        <div class="form-group">
            <label class="col-md-2 control-label">
                Lớp
            </label>
            <div class="col-md-10">
                {!! Form::select('classes_id', $classes, @$data['classes_id'], ['class' => 'form-control']) !!}
            </div>
        </div>
         <div class="form-group">
            <label class="col-md-2 control-label">
                Họ và tên
            </label>
            <div class="col-md-3">
                {!! Form::text('first_name', @$data['first_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Họ ...']) !!}
            </div>
             <div class="col-md-3">
                {!! Form::text('middle_name', @$data['middle_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Đệm ...']) !!}
            </div>
             <div class="col-md-4">
                {!! Form::text('last_name', @$data['last_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên ...']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Tên đăng nhập
            </label>
            <div class="col-md-10">
                {!! Form::text('user_name', @$data['user_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên đăng nhập']) !!}
                {!! Form::hidden('user_name_old', @$data['user_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Tên đăng nhập']) !!}
                @if($errors->first('user_name') )
                    <span class="help-block error">
                        {!! $errors->first('user_name') !!}
                    </span>
                @endif
                 @if(@$err)
                    <span class="help-block error">
                        {!!@$err['user_name']!!}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Email
            </label>
            <div class="col-md-10">
                {!! Form::text('user_email', @$data['user_email'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email']) !!}
                {!! Form::hidden('user_email_old', @$data['user_email'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email']) !!}
                @if($errors->first('user_email') )
                    <span class="help-block error">
                        {!! $errors->first('user_email') !!}
                    </span>
                @endif
                 @if(@$err)
                    <span class="help-block error">
                        {!!@$err['user_email']!!}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Ngày sinh
            </label>
            <div class="col-md-10">
                {!! Form::text('birth_date', @$data['birth_date'], ['class' => 'form-control cfi-birth', 'required' => true, 'placeholder' => 'Ngày sinh']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Trường học
            </label>
            <div class="col-md-10">
                {!! Form::text('school_name', @$data['school_name'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Trường học']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
                Loại người dùng
            </label>
            <div class="col-md-10">
              {!! Form::select('user_type', array(0 => 'Người dùng', 1 => 'Nhân viên',2 => 'Quản trị viên'),'',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">
            </label>
            <div class="col-md-10">
                {!! Form::submit($submit.' người dùng', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{url('admin/user')}}">
                    Quay lại
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.cfi-birth').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
@endsection