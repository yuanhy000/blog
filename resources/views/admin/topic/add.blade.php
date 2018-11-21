@extends('layouts.admin')
@section('content')
    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/topic')}}">章节管理</a>
        &raquo; 添加章节
    </div>
    <!--顶部导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加章节</h3>
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
                <a href="{{url('admin/topic/create')}}"><i class="fa fa-plus"></i>添加章节</a>
                <a href="{{url('admin/topic')}}"><i class="fa fa-recycle"></i>全部章节</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/topic')}}" method="post">
            @csrf
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120">课本：</th>
                    <td>
                        <select name="text_id">
                            @foreach($data as $d)
                                <option value="{{$d->text_id}}">{{$d->text_note}}-{{$d->text_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>章节名称：</th>
                    <td>
                        <input type="text" class="lg" name="top_name">
                    </td>
                </tr>
                <tr>
                    <th>备注：</th>
                    <td>
                        <input type="text" class="lg" name="top_note">
                    </td>
                </tr>
                <tr>
                    <th>章节听力：</th>
                    <td>
                        <input type="text" size="50" name="top_listen">

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
                                        $('input[name=top_listen]').val(data);
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
                    <th>章节单词：</th>
                    <td>
                        <script type="text/javascript" charset="utf-8"
                                src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8"
                                src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"></script>
                        <script type="text/javascript" charset="utf-8"
                                src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        <script id="editor" name="top_word" type="text/plain"
                                style="width:860px;height:500px;"></script>
                        <script type = "text/javascript" >
                        var ue = UE.getEditor('editor');
                        </script>

                        <!-- 编辑器代码矫正 -->
                        <style>
                            .edui-default {
                                line-height: 28px;
                            }

                            div.edui-combox-body, div.edui-button-body, div.edui-splitbutton-body {
                                overflow: hidden;
                                height: 20px;
                            }

                            div.edui-box {
                                overflow: hidden;
                                height: 22px;
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