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
            <p><span class="glyphicon glyphicon-book" style="color: #666;">&nbsp;</span>单词列表</p>
        </div>
        <div class="col-md-12">
            <?php $n = 0 ?>
            @foreach($word_all as $w)
                <div class="btn btn-primary" id="word_div">
                    <a href="{{url('word_detail/'.$w->top_id.'_'.$w->word_id)}}" role="button" id="word_a"
                       target="_top"><span>{{$w->word_name}}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div>{{$w->word_mean}}</div></span></a>
                    <div class="video_main">
                        <ul>
                            <li class="video_main_video">
                                <video id={{"videoPlay".$n}} width="18" height="18 " src="{{url($w->word_pro)}}"
                                       poster="/resources/views/home/img/pro.png"  x-webkit-airplay="true"
                                       webkit-playsinline="true" onclick="begin(this)"></video>
                                <?php $n++ ?>
                            </li>
                        </ul>
                    </div>
                </div>

            @endforeach
            {{session(['num' => $n])}}
        </div>
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
                <a href="{{url('top_word/'.$get_text_id["text_id"])}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
        </div>
    </div>
</section>

<script>
    function begin(element) {
        var video = document.getElementById(element.id);
        if (video.paused) { //如果已暂停则播放
            video.play(); //播放控制
        } else { // 已播放点击则暂停
            video.pause(); //暂停控制
        }


        //     }
        //         $(".playbtn").click(function () {
        //             console.log($('#movie').get(0).paused);
        //             $('#movie').get(0).play();
        //         });
        //
        //         function toggleSound() {
        //             if ($('#movie').get(0).paused) {
        //                 $('#movie').get(0).play();
        //             }
        //             else {
        //                 $('#movie').get(0).pause();
        //             }
    };

</script>

</body>
</html>