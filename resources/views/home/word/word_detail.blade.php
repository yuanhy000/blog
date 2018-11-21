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
    <title>单词详解</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/word_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{$topic->top_name}}</p>
            </a>
                <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt=""
                                                                 class="top_user"></a>
        </span>
    </div>
</nav>

<section>
    <div class="container" id="con_bottom" style="margin-left: 0px;">
        <div class="ccc">
            <h3 class="word_name">{{$word->word_name}}</h3>
            <p class="word_mean">{{$word->word_mark}}</p>
            <p class="word_mean">{{$word->word_mean}}</p>
            <p class="word_example1">例句 : {{$word->word_example_en}}</p>
            <p class="word_example2">释义 : {{$word->word_example_ch}}</p>
        </div>
    </div>
    <div class="container">
        @if($word->word_id>1)
            <a href="{{url('word_detail/'.$word->top_id.'_'.$article['pre']->word_id)}}" target="_top"
               class="btn btn-primary"
               id="word_left"
               role="button"><span class="glyphicon glyphicon-arrow-left" style="color: #666;">　</span>previous</a>
        @else

            <a href="{{url('word_detail/'.$word->top_id.'_'.$word->word_id)}}" target="_top"
               class="btn btn-primary"
               id="word_left"
               role="button">None</a>
        @endif
        <a role="button">
            <video id="videoPlay" width="14%" src="{{url($word->word_pro)}}"
                   poster="/resources/views/home/img/play.png" loop="loop" x-webkit-airplay="true"
                   webkit-playsinline="true">
            </video>
        </a>

        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<a href="" target="_top" class="btn btn-primary"--}}
        {{--id="word_left"--}}
        {{--role="button"><span class="glyphicon glyphicon-volume-up" style="color: #666;"></span>&nbsp;&nbsp;读音</a>--}}
        {{--</div>--}}
        @if($article['next'])
            <a href="{{url('word_detail/'.$word->top_id.'_'.$article['next']->word_id)}}" target="_top"
               class="btn btn-primary"
               id="word_right"
               role="button">next one　<span class="glyphicon glyphicon-arrow-right" style="color: #666;"></span></a>
        @else

            <a href="{{url('word_detail/'.$word->top_id.'_'.$word->word_id)}}" target="_top"
               class="btn btn-primary"
               id="word_right"
               role="button">None</a>
        @endif
    </div>
</section>
<section id="Topic">
    <div class="container" style="margin-top: 30px">
        <div class="col-md-12">
            <p><span class="glyphicon glyphicon-book" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;其他章节</p>
        </div>
        <div class="col-md-12">
            @foreach($topic_all as $t)
                <a href="{{url('word_all/'.$t->top_id)}}" class="btn btn-primary" id="topic" role="button"
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
                <a href="{{url('word_all/'.$topic->top_id)}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
        </div>
    </div>
</section>
<script>

    video = document.getElementById("videoPlay");
    video.onclick = function () {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
    }
</script>
</body>
</html>