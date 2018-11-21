<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <script src="{{url('https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{url('https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/views/home/css/style.css')}}" type="text/css">
    <title>用户设置</title>
</head>
<body>
<nav class="user_navbar">
    <div class="top_bg"><a href="{{url('/')}}" class="top_a"><img src="/resources/views/home/img/picture.jpg" alt=""
                                                                  class="top_img">
            <p class="top_index">个人中心</p></a>
    </div>
    <a href="{{url(session('url'))}}" class="top_a"><img src="/resources/views/home/img/back.png" alt=""
                                                         class="top_back"></a>
</nav>

<section id="user">
    <!--图片滤镜层-->
    <div class="lvjing">
        <div class="container">
            <div>
                <img src="/resources/views/home/img/user.png" alt="" class="content_user">
                <span class="user_p1">知识改变命运，英语创造人生！</span>
                <span class="user_p2">Knowledge upgrades our fate, and English creates our life!</span>
            </div>
        </div>
    </div>
</section>

<div class="user_conf">
    <div class="container" style="padding: 0;">
        <div class="border">
            <a href="{{url('/listen_conf')}}" class="btn btn-primary" id="user_config" role="button" target="_top">
                <p class="user_cp1">年级</p>
                <p class="user_cp2">{{session('grade_name')}}</p>
            </a>
            <a href="{{url('/listen_conf')}}" class="btn btn-primary" id="user_config" role="button" target="_top">
                <p class="user_cp1">教材<br>
                <p class="user_cp2">{{session('textbook_name')}}</p>
            </a>
            <a href="{{url('/listen_conf')}}" class="btn btn-primary" id="user_config2" role="button" target="_top">
                <p class="user_cp1">分册<br>
                <p class="user_cp2">{{session('level_name')}}</p>
            </a>
        </div>
    </div>
</div>

<a href="{{url('/logout')}}" class="btn btn-default" type="submit" id="logout"><span class="login_button">退出用户</span></a>
</body>
</html>