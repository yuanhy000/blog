@extends('layouts.admin')
@section('content')
    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a
                href="{{url('admin/language')}}">训练管理</a>
        &raquo; 添加训练
    </div>
    <!--顶部导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加训练</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            @if(session('_error'))
                <div class="mark">
                    <p>{{session('_error')}}</p>
                </div>
                <?php session(['_error' => null]);?>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/language/create')}}"><i class="fa fa-plus"></i>添加训练</a>
                <a href="{{url('admin/language')}}"><i class="fa fa-recycle"></i>全部训练</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/language')}}" method="post">
            @csrf
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120">章节：</th>
                    <td>
                        <select name="top_id">
                            @foreach($data as $d)
                                <option value="{{$d->top_id}}">{{$d->top_note}}-{{$d->top_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>正确答案：</th>
                    <td>
                        <input type="text" name="lan_right">
                    </td>
                </tr>

                <tr>
                    <th>错误答案1：</th>
                    <td>
                        <input type="text" name="lan_error1">
                    </td>
                </tr>

                <tr>
                    <th>错误答案2：</th>
                    <td>
                        <input type="text" name="lan_error2">
                    </td>
                </tr>

                <tr>
                    <th>训练图片：</th>
                    <td>
                        <input type="text" size="40" name="lan_thumb">

                        <!-- 上传图片插件引入 -->

                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                        <script src="{{asset('resources/org/uploadify/jquery.uploadify.js')}}"
                                type="text/javascript"></script>
                        <link rel="stylesheet" type="text/css"
                              href="{{asset('resources/org/uploadify/uploadify.css')}}">
                        <script type="text/javascript">
                            <?php $timestamp = time();?>
                            $(function () {
                                $('#file_upload').uploadify({
                                    'buttonText': '文件上传',
                                    'formData': {
                                        'timestamp': '<?php echo $timestamp;?>',
                                        '_token': "{{csrf_token()}}"
                                    },
                                    'swf': "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                    'uploader': "{{url('admin/upload')}}",
                                    'onUploadSuccess': function (file, data, response) {
                                        $('input[name=lan_thumb]').val(data);
                                    }
                                });
                            });
                        </script>
                        <style>
                            .uploadify {
                                display: inline-block;
                            }

                            .uploadify-button {
                                border: none;
                                border-radius: 5px;
                                margin-top: 8px;
                            }

                            table.add_tab tr td span.uploadify-button-text {
                                color: #FFF;
                                margin: 0;
                            }
                        </style>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection