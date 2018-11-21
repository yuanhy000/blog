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
    <title>同步单词</title>
</head>
<body>

<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/word_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{session('grade_name')}}&nbsp;&nbsp;{{session('level_name')}}
                    &nbsp;&nbsp;{{session('textbook_name')}}</p>
            </a>
            <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt=""
                                                             class="top_user"></a>
        </span>
    </div>
</nav>


<section id="Word">
    <div class="container" style="padding: 0;">
        <div class="col-md-12" style="padding: 0;">
            <div>
                <div class="col-md-12">
                    <p><span class="glyphicon glyphicon-th-large" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;单词学习</p>
                </div>
                <div class="col-md-4" style="padding: 0;">
                    <?php $id = session('textbook_id'); ?>
                    <a href="http://english.hd/top_word/{{$id}}" class="btn btn-primary" role="button"
                       target="_top">
                        <img src="/resources/views/home/img/word_learn.png" class="img-responsive" id="word_learn">
                        <p class="word_title">单词详解</p>
                    </a>
                </div>
                <div class="col-md-4" style="padding: 0;">
                    <a href="http://english.hd/top_phrase/{{$id}}" class="btn btn-primary" role="button"
                       target="_top">
                        <img src="/resources/views/home/img/Phrase.png" class="img-responsive" id="word_learn">
                        <p class="word_title">词组短语</p>
                    </a>
                </div>
                <div class="col-md-4" style="padding: 0;">
                    <a href="http://english.hd/top_language/{{$id}}" class="btn btn-primary" role="button"
                       target="_top">
                        <img src="/resources/views/home/img/language.png" class="img-responsive" id="word_learn">
                        <p class="word_title">母语训练</p>
                    </a>
                </div>

                <div class="col-md-12">
                    <p><span class="glyphicon glyphicon-th-large" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;其他功能</p>
                </div>

                <div class="col-md-4" style="padding: 0;">
                    <a href="http://english.hd/top_self/{{$id}}" class="btn btn-primary" role="button"
                       target="_top">
                        <img src="/resources/views/home/img/pen.png" class="img-responsive" id="word_learn">
                        <p class="word_title">自助听写</p>
                    </a>
                </div>
                <div class="col-md-4" style="padding: 0;">
                    <a href="" class="btn btn-primary" role="button"
                       target="_top">
                        <img src="/resources/views/home/img/lesson.png" class="img-responsive" id="word_learn">
                        <p class="word_title">同步课堂</p>
                    </a>
                </div>
            </div>
        </div>
</section>
</body>
</html>