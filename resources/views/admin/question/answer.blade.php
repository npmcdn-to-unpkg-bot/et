@extends('layouts.admin')

@section('title', 'Bảng điều khiển | Câu trả lời')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ url('admin/answer/create') }}">
                <button aria-expanded="false" class="btn btn-custom dropdown-toggle waves-effect waves-light" type="button">
                    <i class="fa fa-plus">
                    </i>
                    Sắp xếp vị trí câu trả lời
                    <span class="m-l-5">
                    </span> 
                </button>
            </a>
        </div>
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            QUẢN LÝ CÂU TRẢ LỜI
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <div class="row">
        <div class="col-md-7">
            <h4 class="header-title m-t-0 m-b-30">
                Câu hỏi : {{$data['question_description']}}
            </h4>
            <h5 style="color:#71B6F9">Danh sách câu trả lời</h5>
                <div class=" table-responsive">
                    <div class="container">
                        <table class="table table-hover cfi-dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        Mô tả
                                    </th>
                                    <th>
                                        Giải thích
                                    </th>
                                    <th>
                                        Đúng/Sai
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
            <div class="col-md-5">
                <h4 class="header-title m-t-0 m-b-30" >
                    <span class="cfi-add">{{$submit}}</span> <span class="cfi-edit"></span> câu trả lời
                </h4>
                <div class="">
                    {!! Form::open(array('class' => 'form-horizontal cfi-answer','onsubmit'=>'createAnswer()', 'method' => 'post')) !!}
                        {!! Form::token() !!}
                       {!! Form::hidden('questions_id', @$data['id'], ['class' => 'form-control questions_id', 'required' => true]) !!}
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('answer_description', '', ['class' => 'form-control answer_description', 'required' => true, 'placeholder' => 'Mô tả câu trả lời']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('answer_explanation', '', ['class' => 'form-control answer_explanation', 'required' => true, 'placeholder' => 'Giải thích']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            

                            {!! Form::select('answer_isright', array(1 => 'Đúng', 0 => 'Sai'),'',['class'=>'form-control answer_isright']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                {!! Form::submit("Thêm", ['class' => 'btn btn-primary cfi-submit']) !!}
                {!! Form::button('Hủy', ['class' => 'btn btn-default cfi-reset','onclick'=>'returnAdd()']) !!}
            </div>
        </div>
        {!! Form::close() !!}
                </div>
                <div class="cfi-response"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $('.cfi-reset').hide();
        var stt = 1;
        var table = $('.cfi-dataTable').dataTable({
            language: config.datatable.language,
            ajax: '{{asset("api/v1/answer?question=".$data['id'])}}',
                columns: [
                {
                    data: 'answer_description'
                },
                {
                    data: 'answer_explanation'
                },
                {
                    data: 'answer_isright',
                    render : function(data, type, row){
                        if(data==0){
                            return "Sai";
                        }else
                        return "Đúng";
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row){
                        return '<div class="btn-group" role="group" aria-label="..."><button class="btn btn-warning btn-sm" onclick="updateAnswer('+data+')"><i class="fa fa-cogs" aria-hidden="true"></i></button><a onclick="deleteAnswer('+data+')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>';
                    }
                }]
            });
    $(".cfi-answer").submit(function(e){
        return false;
    });
    function createAnswer(){
            var data = {
                'questions_id' : $('.questions_id').val(),
                'answer_description' : $('.answer_description').val(),
                'answer_explanation' : $('.answer_explanation').val(),
                'answer_isright' : $('.answer_isright').val()
            };
            $.ajax({
                method: "POST",
                url: "{{asset('api/v1/answer/create')}}",
                data: {data},
                success : function(response){
                $('.cfi-answer')[0].reset();
                table._fnAjaxUpdate();
              }
            });
        }
    function updateAnswer(id){
        $('.cfi-add').hide();
        $('.cfi-edit').html("Sửa");
        $('.cfi-reset').show();
        $('.cfi-submit').attr('value',"Sửa");
        $.ajax({
            method: "GET",
            url: "{{asset('api/v1/answer?id=')}}"+id,
            success : function(response){
                $('.cfi-answer').attr('onsubmit','doUpdateAnswer('+response.data.id+')');
                $('.questions_id').val(response.data.questions_id);
                $('.answer_description').val(response.data.answer_description);
                $('.answer_explanation').val(response.data.answer_explanation);
                $('.answer_isright').val(response.data.answer_isright);
          }
        });
    }

    function doUpdateAnswer(id){
        var data = {
                'questions_id' : $('.questions_id').val(),
                'answer_description' : $('.answer_description').val(),
                'answer_explanation' : $('.answer_explanation').val(),
                'answer_isright' : $('.answer_isright').val()
            };
        $.ajax({
        method: "POST",
        url: "{{asset('api/v1/answer/update')}}"+"/"+id,
        data : data,
        success : function(response){
            table._fnAjaxUpdate();
        }
        });
    }

    function deleteAnswer(id){
        $.ajax({
              method: "GET",
              url: "{{asset('api/v1/answer/delete/')}}"+"/"+id,
              success : function(){
               table._fnAjaxUpdate();
              }
            });
    }
    function returnAdd(){
        $('.cfi-answer')[0].reset();
        $('.cfi-add').show();
        $('.cfi-submit').attr('value',"Thêm");
        $('.cfi-reset').hide();
        $('.cfi-edit').html(" ");
        $('.cfi-answer').attr('onsubmit','createAnswer()'); 
    }
</script>
@endsection
