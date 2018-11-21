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
    <script type="text/javascript" src="{{url('resources/org/jwplayer/jwplayer.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/org/jwplayer/js/jquery-3.2.1.js')}}"></script>
    <script>jwplayer.key = "hTHv8+BvigYhzJUOpkmEGlJ7ETsKmqyrQb8/PetBTBI=";</script>
    <title>同步听力</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/listen_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{$topic->top_name}}</p>
            </a>
                <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt="" class="top_user"></a>
        </span>
    </div>
</nav>

<div id="player">
    {{$topic->top_name}}
</div>

<section id="Topic">
    <div class="container"style="margin-top: 30px">
        <div class="col-md-12">
            <p><span class="glyphicon glyphicon-book" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;其他章节</p>
        </div>
        <div class="col-md-12">
            @foreach($topic_all as $t)
                <a href="{{url('listen/'.$t->top_id)}}" class="btn btn-primary" id="topic" role="button"
                   target="_top"><span>{{$t->top_name}}</span></a>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="col-md-12" style="padding: 0;">
        <div class="container" style="padding: 0;">
            <div class="col-md-6">
                <a href="{{url('/')}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回首页</a>
            </div>
            <div class="col-md-6">
                <a href="{{url('/conf')}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">设置教材</a>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    jwplayer("player").setup({
        @if($topic->top_listen != null)
        "file": "{{url($topic->top_listen)}}",
        @else
        "file": "{{url('resources/org/jwplayer/video.mp4')}}",//视频文件路径
        @endif
        "aspectratio": "9:16",//播放器自适应比例
        "width": "auto",//播放器高度
        "type": "mp4",//播放文件类型（可选）
        "title": "{{$topic->top_name}}",//标题（可选）
        // "description": "测试视频描述",//描述（可选）
        "image": "{{url('resources/views/home/img/listen.png')}}",//视频封面（可选）
        "repeat": "true",//重复播放（留空则不重复播放）
        "autostart": "",//自动播放（留空则不启用自动播放）
        "largecontrols": "true",
    });
</script>
</body>
</html>