@extends('layouts.admin')

@section('title', 'Bảng điều khiển | Đề thi')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            <i class="fa fa-pie-chart">
            </i>
            QUẢN LÝ ĐỀ THI
        </h4>
    </div>
</div>
<div class="row">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title m-t-0 m-b-30">
                    Danh sách đề thi
                </h4>
                <div class="table-responsive">
                    <div class="container">
                        <table class="table table-hover cfi-dataTable">
                            <thead>
                            	<tr>
                            		<td>
                            			<select name="" id="test_type" class="form-control">
                            				<option value="1">Đề thi tự tạo</option>
                            				<option value="0">Đề thi random</option>
                            			</select>
                            		</td>
                            	</tr>
                                <tr>
                                    <th>
                                        STT
                                    </th>
                                    <th>
                                        Tên đề thi
                                    </th>
                                    <th>
                                        Loại đề thi
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
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $.fn.dataTable.ext.search.push(function( settings, data, dataIndex ) {
            var test_type = parseInt($('#test_type').val());
            var d = parseFloat(data[2]) || 0;
            if(d == test_type){
                return false;
            }
            return true;
        });
        var stt = 1;
        var table = $('.cfi-dataTable').dataTable({
            language: config.datatable.language,
            ajax: '{{asset("api/v1/test")}}',
                columns: [{
                    data: 'id',
                    render: function(data, type, row){
                        return stt ++;
                    }
                },
                {
                    data: 'test_name'
                },
                {
                    data: 'test_type',
                    render: function(data, type, row){
                    	switch(data){
                    		case 0:
                    			return 'random';
                    			break;
                    		case 1:
                    			return 'tự tạo';
                    			break;
                    	}
                    }
                },
                {
                    data: 'test_description'
                },{
                    data: 'id',
                    render: function(data, type, row){
                        return '<div class="btn-group" role="group" aria-label="..."><a class="btn btn-warning btn-sm" href="test/update/'+data+'"><i class="zmdi zmdi-edit"></i></a><a  onclick="confirm('+data+')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a><a href="test/question/'+data+'" class="btn btn-primary btn-sm"><i class="zmdi zmdi-receipt"></i></a></div>';
                    }
                }]
            });

            $('#test_type').on('change', function() {
                table.fnDraw();
            });

        });

        function confirm(id){
             $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn muốn xóa câu hỏi này không?',
                confirm: function(){
                    window.location.href = 'question/delete/'+id;
                },
                cancel: function(){
                   $('.jconfirm-box').fadeOut();
                }
            });
        }
</script>
@endsection
