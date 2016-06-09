@extends('layouts.admin')
@section('title', 'Bảng điều khiển | Lĩnh vực')
@section('content')
<div class="row">
    <div class="col-sm-12">
         <div class="btn-group pull-right m-t-15">
            <a href="{{ url('admin/domain/create') }}">
                <button aria-expanded="false" class="btn btn-custom dropdown-toggle waves-effect waves-light" type="button">
                    <i class="fa fa-plus">
                    </i>
                    Thêm mới lĩnh vực
                    <span class="m-l-5">
                    </span>
                </button>
            </a>
        </div>
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            Lĩnh vực
        </h4>
    </div>
</div>
<input class="url" name="" type="hidden" value="{{ url('admin') }}">
    <div class="row">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">
                Danh sách lĩnh vực
                <div class="pull-right cfi-err">
               
            </div>
            </h4>
            
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-hover cfi-dataTable ">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên lĩnh vực
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
            ajax: '{{asset("api/v1/domain")}}',
                columns: [{
                    data: 'id'
                },
                {
                    data: 'domain_name'
                },
                {
                    data: 'domain_description'
                },{
                    data: 'id',
                    render: function(data, type, row){
                        return '<div class="btn-group" role="group" aria-label="..."><a class="btn btn-warning btn-sm" title="Sửa" href="domain/update/'+data+'"><i class="fa fa-cogs" aria-hidden="true"></i></a><a title="Xóa"  onclick="confirm('+data+')" class="btn btn-danger btn-sm "><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>';
                    }
                }]
            });
        });
        function confirm(id){
            var check = 'domains_id';
            $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn muốn xóa lĩnh vực này không?',
                confirm: function(){
                    $.ajax({
                        method: "GET",
                        url: "{{asset('api/v1/check')}}"+"/"+id+"/"+check,
                        success : function(response){
                            if(response=="true"){
                                window.location.href = 'domain/delete/'+id;
                            }else{
                                $('.cfi-err').html('<span style="color:red">Lĩnh vực bạn muốn xóa vẫn còn câu hỏi.</span>')
                                setTimeout($('.cfi-err').fadeOut(),30000);
                            }
                        }
                    });
                    
                },
                cancel: function(){
                   $('.jconfirm-box').fadeOut();
                }
            });
        }
    </script>
    @endsection