@extends('layouts.admin')

@section('title', 'Bảng điều khiển | Thêm câu hỏi cho đề thi')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <button class="btn btn-info" type="button" data-toggle="modal" href='#modal-id'>
                Thêm câu hỏi
                <span class="m-l-5">
                    <i class="fa fa-edit">
                    </i>
                </span>
            </button>
        </div>
        <h4 class="page-title">
           	THÊM CÂU HỎI CHO ĐỀ THI
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title m-t-0 m-b-30">
                    Danh sách câu hỏi
                </h4>
                <div class="table-responsive">
                    <div class="container">
                        <table class="table table-hover cfi-dataTable">
                            <thead>
                                <tr>
                                    <td>
                                        <select name="" id="question_type" class="form-control">
                                        	<option value="0">Không thuộc bài Test</option>
                                        	<option value="1">Thuộc bài Test</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Lĩnh vực
                                    </th>
                                    <th>
                                        Mô tả
                                    </th>
                                    <th>
                                        Giải thích
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
    </div>
    
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Thêm câu hỏi cho đề thi
                    </h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('url' => 'admin/question/create/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
        {!! Form::token() !!}
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Chương
                        </label>
                        <div class="col-md-10">
                            {!! Form::select('chapters_id', $chapters, @$data['chapters_id'], ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Cấp độ
                        </label>
                        <div class="col-md-10">
                            {!! Form::select('levels_id', $levels, @$data['levels_id'], ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Nhóm
                        </label>
                        <div class="col-md-10">
                            {!! Form::select('classes_id', $classes, @$data['classes_id'], ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Lĩnh vực
                        </label>
                        <div class="col-md-10">
                            {!! Form::select('domains_id', $domains, @$data['domains_id'], ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Mô tả
                        </label>
                        <div class="col-md-10">
                            {!! Form::textarea('question_description', @$data['question_description'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mô tả câu hỏi']) !!}
                 {!! Form::hidden('question_description_old', @$data['question_description'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mô tả câu hỏi']) !!}
                @if($errors->first('question_description') )
                            <span class="help-block error">
                                {!! $errors->first('question_description') !!}
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
                            Giải thích
                        </label>
                        <div class="col-md-10">
                            {!! Form::textarea('question_explaination', @$data['question_explaination'], ['class' => 'form-control', 'required' => true, 'placeholder' => 'Giải thích câu hỏi']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                        </label>
                        <div class="col-md-10">
                            {!! Form::submit('Thêm câu hỏi', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::hidden('test', 1) !!}
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

	var q = '{{$test->test_parameters}}';

	q = q.replace(/&quot;/g, '"');

	if(q.length != 0){

		q = JSON.parse(q);

	}

    $.fn.dataTable.ext.search.push(function( settings, data, dataIndex ) {

        var is = parseInt($('#question_type').val());

        var qid = data[0];

        if(is == 0){

        	if(checkExist(qid, q) == false){

        		return true;

        	}else{

        		return false;

        	}
        }

        if(is == 1){

        	if(checkExist(qid, q) == true){

        		return true;

        	}else{

        		return false;

        	}
        }

        return true;

    });

    var stt = 1;

    var table = $('.cfi-dataTable').dataTable({

        language: config.datatable.language,

        processing: true,

        serverSide: true,

        ajax: '{{asset("api/v1/question")}}',

            columns: [
            {

                data: 'id'
            },
            {
                data: 'domains_id'
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

                	if(checkExist(data, q) == true){

                		var checked = 'checked=""';

                	}

                	else{

                		var checked = '';

                	}

                    return '<div class="checkbox checkbox-danger"><input type="checkbox" '+checked+' id="checkbox'+data+'" class="addQ" onchange="addQ('+data+')"><label for="checkbox'+data+'"></label></div>';
                }
            }]
        });

        $('#question_type').on('change', function() {

            table.fnDraw();

        });
    	function addQ(id){

    		$.ajax({

    			url: '{{asset("api/v1/test/add-question")}}',

    			type: 'post',

    			data: {

    				question_id: id,

    				test_id: {{$test->id}},

    				_token: '{{csrf_token()}}'

    			},

    			success: function(response){

    				q = response;

    				table.api().ajax.reload();

    			}
    		});
    	}

    	function checkExist(qid, arr){

    		for (var i = 0; i < arr.length; i++) {

    			if(arr[i].questions_id == qid){

    				return true;

    			}
    		}

    		return false;
    	}

</script>
@endsection
