@extends('layouts.admin')

@section('title', 'Bảng điều khiển | Thêm Câu hỏi')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ul class="breadcrumb">
        <li>
            <a href="{{asset('admin')}}">
                Bảng điều khiển
            </a>
        </li>
        <li>
            <a href="{{asset('admin/question')}}">
                Quản lý câu hỏi
            </a>
        </li>
        <li class="active">
            Thêm câu hỏi
        </li>
    </ul>
    <div class="container-fluid">
        <div class="clear10">
        </div>
        <div class="row">
            {!! Form::open(array('url' => 'admin/question/'.$action.'/'.@$data['id'], 'class' => 'form-horizontal', 'method' => 'post')) !!}
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
                        {!! Form::textarea('question_description', @$data['question_description'], ['class' => 'form-control', 'id' => 'question-desc']) !!}
                 {!! Form::hidden('question_description_old', @$data['question_description'], ['class' => 'form-control', 'required' => true]) !!}
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
                        {!! Form::textarea('question_explaination', @$data['question_explaination'], ['class' => 'form-control', 'id' => 'question-expl']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">
                    </label>
                    <div class="col-md-10">
                        {!! Form::submit($submit.' câu hỏi', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('question-desc', {
        language: 'vi',
        width: '100%',
        height: 220,
        enterMode: 2,
        filebrowserBrowseUrl: '{{asset('js/ckfinder/ckfinder.html')}}',
        filebrowserImageBrowseUrl: '{{asset('js/ckfinder/ckfinder.html?Type=Images')}}',
        filebrowserFlashBrowseUrl: '{{asset('js/ckfinder/ckfinder.html?Type=Flash')}}',
        filebrowserUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
        filebrowserImageUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}',
        filebrowserFlashUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}'
    });

    CKEDITOR.replace('question-expl', {
        language: 'vi',
        width: '100%',
        height: 220,
        enterMode: 2,
        filebrowserBrowseUrl: '{{asset('js/ckfinder/ckfinder.html')}}',
        filebrowserImageBrowseUrl: '{{asset('js/ckfinder/ckfinder.html?Type=Images')}}',
        filebrowserFlashBrowseUrl: '{{asset('js/ckfinder/ckfinder.html?Type=Flash')}}',
        filebrowserUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
        filebrowserImageUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}',
        filebrowserFlashUploadUrl: '{{url('js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}'
    });
</script>
@endsection
