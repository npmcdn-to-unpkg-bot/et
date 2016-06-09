@extends('layouts.admin')

@section('title', 'Bảng điều khiển | Câu hỏi')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ul class="breadcrumb">
        <li>
            <a href="{{asset('admin')}}">
                Bảng điều khiển
            </a>
        </li>
        <li class="active">
            Quản lý câu hỏi
        </li>
    </ul>
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
                <a class="btn btn-success" href="{{url('admin/question/create')}}">
                    Thêm câu hỏi
                </a>
            </div>
        </div>
        <div class="clear10">
        </div>
        <div class="row">
            <form class="form-inline filter-product" role="form">
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('chapters_id', $chapters, '', ['class' => 'form-control', 'id'=>'chapter-val']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('levels_id', $levels, '', ['class' => 'form-control', 'id'=>'level-val']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('classes_id', $classes, '', ['class' => 'form-control', 'id'=>'classes-val']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('domains_id', $domains, '', ['class' => 'form-control', 'id'=>'domain-val']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <input class="form-control" name="name-val" placeholder="Tên sản phẩm" type="text" value="" id="name">
                    </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-success" type="button" id="filter">
                            Lọc
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear10">
        </div>
        <div class="table-responsive">
            <table cellpadding="1" cellspacing="1" class="table table-striped table-hover" id="cfi-dataTable" width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <th>ID</th>
                        <th>Mô tả</th>
                        <th>Giải thích</th>
                        <th style="text-align: center;" width="15%">
                            Thao tác
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    config.datatable.serverSide = true;
    config.datatable.ajax = '{{url('api/v1/question')}}';
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
            data: 'question_description'
        },
        {
            data: 'question_explaination'
        },
        {
            data: 'id',
            render: function(data, type, row){
                var btn = '<div class="btn-group">';
                btn += '<a class="btn btn-primary btn-sm" data-toggle="tooltip" href="question/update/'+data+'" title="Sửa"><span class="glyphicon glyphicon-pencil"></span></a>';
                btn += '<a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="question/delete?id='+data+'" title="Xóa"><span class="glyphicon glyphicon-trash"></span></a></divs>';
                return btn;
            }
        }
    ];

    var table = $('#cfi-dataTable').dataTable(config.datatable);

    config.deleteFromCb('{{url('admin/question/delete')}}');

    $('#filter').click(function(){

        var domain = parseInt($('#domain-val').val());
        var chapter = parseInt($('#chapter-val').val());
        var level = parseInt($('#level-val').val());
        var classs = parseInt($('#classes-val').val());
        var name = $('#name-val').val();

        if(name == undefined){
            name = '';
        }

        table.api().ajax.url('../api/v1/question?domain='+domain+'&chapter='+chapter+'&level='+level+'&class='+classs+'&name='+name).load();
    });
</script>
@endsection
