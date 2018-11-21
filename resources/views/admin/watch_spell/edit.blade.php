@extends('layouts.admin')
@section('content')
    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a
                href="{{url('admin/word')}}">拼词管理</a>
        &raquo; 拼词编辑
    </div>
    <!--顶部导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>拼词编辑</h3>
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
                <a href="{{url('admin/watch_spell/create')}}"><i class="fa fa-plus"></i>添加拼词</a>
                <a href="{{url('admin/watch_spell')}}"><i class="fa fa-recycle"></i>全部拼词</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/watch_spell/'.$field->ws_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            @csrf
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120">章节：</th>
                    <td>
                        <select name="top_id">
                            @foreach($data as $d)
                                <option value="{{$d->top_id}}"
                                        @if($d->top_id == $field->top_id) selected @endif > <!--默认选中-->
                                    {{$d->top_note}}-{{$d->top_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>释义：</th>
                    <td>
                        <input type="text" name="ws_mean" value="{{$field->ws_mean}}">
                    </td>
                </tr>
                <tr>
                    <th>补全单词：</th>
                    <td>
                        <input type="text" name="ws_name" value="{{$field->ws_name}}">
                    </td>
                </tr>
                <tr>
                    <th>正确答案：</th>
                    <td>
                        <input type="text" name="ws_right" value="{{$field->ws_right}}">
                    </td>
                </tr>
                <tr>
                    <th>错误答案1：</th>
                    <td>
                        <input type="text" name="ws_error1" value="{{$field->ws_error1}}">
                    </td>
                </tr>

                <tr>
                    <th>错误答案2：</th>
                    <td>
                        <input type="text" name="ws_error2" value="{{$field->ws_error2}}">
                    </td>
                </tr>

                <tr>
                    <th>错误答案3：</th>
                    <td>
                        <input type="text" name="ws_error3" value="{{$field->ws_error3}}">
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