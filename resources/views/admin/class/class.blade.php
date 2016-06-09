@extends('layouts.admin')
@section('title', 'Bảng điều khiển | Lớp')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ url('admin/class/create') }}">
                <button aria-expanded="false" class="btn btn-custom dropdown-toggle waves-effect waves-light" type="button">
                    <i class="fa fa-plus">
                    </i>
                    Thêm mới lớp
                    <span class="m-l-5">
                    </span>
                </button>
            </a>
        </div>
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            Lớp
        </h4>
    </div>
</div>
    <div class="row">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">
                Danh sách lớp
            </h4>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-hover cfi-dataTable">
                        <thead>
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên lớp
                                </th>
                                <th>
                                    Mô tả
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
    <script type="text/javascript">
        $(document).ready(function(){
        var stt = 1;
        var table = $('.cfi-dataTable').dataTable({
            language: config.datatable.language,
            processing: true,

            serverSide: true,
            ajax: '{{asset("api/v1/class")}}',
                columns: [{
                    data: 'id',
                    render: function(data, type, row){
                        return stt ++;
                    }
                },
                {
                    data: 'class_name'
                },
                {
                    data: 'class_description'
                },{
                    data: 'id',
                    render: function(data, type, row){
                        return '<div class="btn-group" role="group" aria-label="..."><a class="btn btn-warning btn-sm" href="class/update/'+data+'"><i class="fa fa-cogs" aria-hidden="true"></i></a><a  onclick="confirm('+data+')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>';
                    }
                }]
            });
        });
        function confirm(id){
             $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn muốn xóa lớp này không?',
                confirm: function(){
                    window.location.href = 'class/delete/'+id;
                },
                cancel: function(){
                   $('.jconfirm-box').fadeOut();
                }
            });
        }
    </script>
@endsection