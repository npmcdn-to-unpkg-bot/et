@extends('layouts.admin')
@section('title', 'Bảng điều khiển | Người dùng')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ url('admin/user/create') }}">
                <button aria-expanded="false" class="btn btn-custom dropdown-toggle waves-effect waves-light" type="button">
                    <i class="fa fa-plus">
                    </i>
                    Thêm mới người dùng
                    <span class="m-l-5">
                    </span>
                </button>
            </a>
        </div>
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            Người dùng
        </h4>
    </div>
</div>
<input class="url" name="" type="hidden" value="{{ url('admin') }}">
    <div class="row">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">
                Danh sách người dùng
            </h4>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-hover cfi-dataTable ">
                        <thead>
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Họ và tên
                                </th>
                                <th>
                                    Tên đăng nhập
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Trường học
                                </th>
                                <th style="max-width: 125px">
                                    Quản lý
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <select>
        <option>1</option>
        <option>1</option>
        <option>1</option>
        <option>1</option>
        <option>1</option>
    </select>
    <script type="text/javascript">
        $(document).ready(function(){
        var stt = 1;
        var table = $('.cfi-dataTable').dataTable({
            language: config.datatable.language,
            processing: true,

            serverSide: true,
            ajax: '{{asset("api/v1/user")}}',
                columns: [{
                    data: 'id',
                    render: function(data, type, row){
                        return stt ++;
                    }
                },
                {
                    data: null,
                    render : function(data , type, row){
                        return row.first_name +" "+ row.middle_name +" "+ row.last_name;
                    }
                },
                {
                    data: 'user_name'
                },
                {
                    data: 'user_email'
                },
                {
                    data: 'school_name'
                },
                {
                    data: 'id',
                    render: function(data, type, row){
                        return '<div class="btn-group" role="group" aria-label="..."><a class="btn btn-warning btn-sm" title="Sửa" href="user/update/'+data+'"><i class="fa fa-cogs" aria-hidden="true"></i></a><a title="Xóa"  onclick="confirm('+data+')" class="btn btn-danger btn-sm "><i class="fa fa-trash-o" aria-hidden="true"></i></a><a title="Xóa"  onclick="block('+data+')" class="btn btn-primary btn-sm "><i class="fa fa-lock" aria-hidden="true"></i></a></div>';
                    }
                }]
            });
        });
        function confirm(id){
             $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn muốn xóa người dùng này không?',
                confirm: function(){
                    window.location.href = 'user/delete/'+id;
                },
                cancel: function(){
                   $('.jconfirm-box').fadeOut();
                }
            });
        }
        function block(id){
             $.confirm({
                title: 'Xác nhận !',
                content: 'Bạn có muốn khóa người dùng này?',
                confirm: function(){
                    window.location.href = 'user/lock/'+id;
                },
                cancel: function(){
                   $('.jconfirm-box').fadeOut();
                }
            });
        }
       
    </script>
    @endsection