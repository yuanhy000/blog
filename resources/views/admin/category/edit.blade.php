@extends('layouts.admin')
@section('content')
    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/category')}}">分类管理</a>
        &raquo; 编辑分类
    </div>
    <!--顶部导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>编辑分类</h3>
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
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分类</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/category/'.$field->cate_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            @csrf
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>父级分类：</th>
                    <td>
                        <select name="cate_pid">
                            <option value="0">==顶级分类==</option>
                            @foreach($data as $d)
                                <option value="{{$d->cate_id}}"
                                        @if($d->cate_id == $field->cate_pid) selected @endif > <!--默认选中-->
                                    {{$d->cate_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>分类名称：</th>
                    <td>
                        <input type="text" name="cate_name" value="{{$field->cate_name}}">
                    </td>
                </tr>
                <tr>
                    <th>分类级别：</th>
                    <td>
                        <input type="text" name="cate_level" value="{{$field->cate_level}}">
                    </td>
                </tr>
                <tr>
                    <th>排序：
                    </th>
                    <td>
                        <input type="text" class="sm" name="cate_order" value="{{$field->cate_order}}">
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