@extends('layouts.admin')
@section('content')
    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/phrase')}}">短语管理</a>
        &raquo; 添加短语
    </div>
    <!--顶部导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加短语</h3>
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
                <a href="{{url('admin/phrase/create')}}"><i class="fa fa-plus"></i>添加短语</a>
                <a href="{{url('admin/phrase')}}"><i class="fa fa-recycle"></i>全部短语</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/phrase')}}" method="post">
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
                    <th>短语名称：</th>
                    <td>
                        <input type="text" name="ph_name">
                    </td>
                </tr>

                <tr>
                    <th>短语音标：</th>
                    <td>
                        <input type="text" name="ph_mark">
                    </td>
                </tr>

                <tr>
                    <th>短语释义：</th>
                    <td>
                        <input type="text" name="ph_mean">
                    </td>
                </tr>
                <tr>
                    <th>格式：</th>
                    <td>
                        <span> 释义1, 释义2   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   记下，拿下</span>
                    </td>
                </tr>

                <tr>
                    <th>短语读音：</th>
                    <td>
                        <input type="text" size="40" name="ph_pro">

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
                                        $('input[name=ph_pro]').val(data);
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
                    <th>例句_英语</th>
                    <td>
                        <textarea name="ph_example_en" cols="30" rows="10"></textarea>
                    </td>
                </tr>

                <tr>
                    <th>例句_中文</th>
                    <td>
                        <textarea name="ph_example_ch" cols="30" rows="10"></textarea>
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