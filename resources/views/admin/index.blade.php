@extends('layouts.admin')
@section('content')
    <!--头部 开始-->
    <div class="top_box">
        <div class="top_left">
            <div class="logo">English后台管理</div>
            <ul>
                <li><a href="{{url('/')}}" target="_blank" class="active">首页</a></li>
                <li><a href="{{url('admin/info')}}" target="main">管理页</a></li>
            </ul>
        </div>
        <div class="top_right">
            <ul>
                <li>管理员：admin</li>
                <li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
                <li><a href="{{url('admin/quit')}}">退出</a></li>
            </ul>
        </div>
    </div>
    <!--头部 结束-->

    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>内容管理</h3>
                <ul class="sub_menu">

                    <li>
                        <a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/textbook')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>课本列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/topic')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>章节列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/word')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>单词列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/phrase')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>短语列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/language')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>训练列表</a>
                    </li>
                    <li>
                        <a href="{{url('admin/find_mean')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>看词择义</a>
                    </li>
                    <li>
                        <a href="{{url('admin/watch_spell')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>看义拼词</a>
                    </li>
                    <li>
                        <a href="{{url('admin/listen_spell')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>听音拼词</a>
                    </li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>
                    <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定义导航</a></li>
                    <li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>网站配置</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--左侧导航 结束-->

    <!--主体部分 开始-->
    <div class="main_box">
        <iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
    </div>
    <!--主体部分 结束-->

    <!--底部 开始-->
    <div class="bottom_box">
        Powered By YUANHY.
    </div>
    <!--底部 结束-->
@endsection
