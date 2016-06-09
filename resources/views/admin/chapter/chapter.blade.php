@extends('layouts.admin')
@section('title', 'Bảng điều khiển | Quản lý Chương')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ul class="breadcrumb">
        <li>
            <a href="{{url('admin')}}">
                Bảng điều khiển
            </a>
        </li>
        <li class="active">
            Quản lý chương
        </li>
    </ul>
    <div class="container-fluid">
        
        <div class="clear10">
        </div>
        <div class="row">
            <form class="form-inline filter-product" role="form">
                <div class="form-group">
                    <label class="sr-only" for="inputName">
                        Tên sản phẩm
                    </label>
                    <input class="form-control" name="name" placeholder="Tên sản phẩm" type="text" value="">
                    </input>
                </div>
                <input class="form-control" name="lang" type="hidden" value="vi">
                    <button class="btn btn-default" type="submit">
                        Lọc
                    </button>
                </input>
            </form>
        </div>
    </div>
    <div class="clear10">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a class="btn btn-default" data-toggle="tooltip" href="#" id="btn-ck-all" title="Chọn / bỏ chọn toàn bộ">
                        <span class="glyphicon glyphicon-unchecked">
                        </span>
                    </a>
                    <a class="btn btn-danger" data-toggle="tooltip" href="#" id="btn-del-all" title="Xóa toàn bộ mục đã chọn">
                        <span class="glyphicon glyphicon-trash">
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success pull-right" href="{{url('admin/chapter/create')}}">
                    <span class="glyphicon glyphicon-plus">
                    </span>
                    Thêm mới
                </a>
            </div>
        </div>
    </div>
    <div class="clear10">
    </div>
    <div class="table-responsive">
        <table cellpadding="1" cellspacing="1" class="table table-striped table-hover" id="cfi-dataTable" width="100%">
            <thead>
                <tr>
                    <td>#</td>
                    <th>ID</th>
                    <th>Tên chương</th>
                    <th style="text-align: center;" width="15%">
                        Thao tác
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    config.datatable.ajax = '{{url('api/v1/chapter')}}';
    config.datatable.columns = [
        {
            data: 'id',
            render: function(data, type, row){
                return '<input class="checkdel" del-id="'+data+'" type="checkbox"/>';
            }
        },
        {
            data: 'id'
        },
        {
            data: 'chapter_name'
        },
        {
            data: 'id',
            render: function(data, type, row){
                var btn = '<div class="btn-group">';
                btn += '<a class="btn btn-primary btn-sm" data-toggle="tooltip" href="chapter/update/'+data+'" title="Sửa"><span class="glyphicon glyphicon-pencil"></span></a>';
                btn += '<a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="chapter/delete?id='+data+'" title="Xóa"><span class="glyphicon glyphicon-trash"></span></a></divs>';
                return btn;
            }
        }
    ];
    var table = $('#cfi-dataTable').dataTable(config.datatable);
    config.deleteFromCb('{{url('admin/chapter/delete')}}');
</script>
@endsection
