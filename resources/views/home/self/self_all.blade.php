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
    <title>单词列表</title>
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

<section id="Topic">
    <div class="container" style="margin-top: 30px">
        <div class="col-md-12">
            <div class="self_top_div">
                <p style="display: inline;"><span class="glyphicon glyphicon-book"
                                                  style="color: #666; display: inline;">&nbsp;</span>单词列表
                </p>
                <input type="button" value="15s" onclick="time(15)" class="word_right2">
                <input type="button" value="10s" onclick="time(10)" class="word_right2">
                <input type="button" value="5s" onclick="time(5)" class="word_right2">
            </div>
        </div>
        <div class="col-md-12">
            @foreach($word_all as $w)
                <div class="self_div">
                    <a href="{{url('word_detail/'.$w->top_id.'_'.$w->word_id)}}" role="button" id="self_a"
                       target="_top">
                        <p class="self_name1">{{$w->word_name}}
                        </p>
                        <p id="self_name2"> {{$w->word_mean}}</p>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="col-md-12">
            <?php $n = 0 ?>
            @foreach($word_all as $w)
                <video id={{"videoPlay".$n}} width="0" height="0 " src="{{url($w->word_pro)}}"
                       poster="/resources/views/home/img/pro.png" x-webkit-airplay="true"
                       webkit-playsinline="true"></video>
                <?php $n++ ?>
            @endforeach
            {{session(['num' => $n])}}
        </div>
        <p style="text-align: center; margin: 0;">
            <input type="button" value="开始" onclick="begin(1)" class="self_begin">
            <input type="button" value="结束" onclick="begin(0)" class="self_begin">
        </p>
    </div>
</section>


<section id="Topic">
    <div class="container" style="margin-top: 30px">
        <div class="col-md-12">
            <p><span class="glyphicon glyphicon-book" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;其他章节</p>
        </div>
        <div class="col-md-12">
            @foreach($topic_all as $t)
                <a href="{{url('self_all/'.$t->top_id)}}" class="btn btn-primary" id="topic" role="button"
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
                <a href="{{url('top_self/'.$get_text_id["text_id"])}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
        </div>
    </div>
</section>

<script>

    var a = 1;
    var id;
    {{session(['self_time' => 13000])}}
    function begin(flag) {


        function playmedia(n) {
            if (a == 1) {
                var mp = document.getElementById("videoPlay" + n);
                mp.play();
                id = setTimeout(function () {
                    playmedia(n + 1);
                }, {{session('self_time')}});
            } else {
                window.clearTimeout(id);
            }
        }

        if (flag == 0) {
            a = 0;
            for (i = 0; i < 100; i++) {
                var mp = document.getElementById("videoPlay" + i);
                document.getElementById("videoPlay" + i).pause();
            }
            window.clearTimeout(id);
        }
        if (flag == 1) {
            a = 1;
            playmedia(0);
        }
    }

    function time(x) {
        if (x == 5) {
            {{session(['self_time' => 8000])}}
        }
        if (x == 10) {
            {{session(['self_time' => 13000])}}
        }
        if (x == 15) {
            {{session(['self_time' => 18000])}}
        }

    }
</script>

</body>
</html>
<div class="video_main">
    <ul>
        <li class="video_main_video">

        </li>
    </ul>
</div>
