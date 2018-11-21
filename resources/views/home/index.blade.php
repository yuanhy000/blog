<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <script src="{{asset('https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/home/css/style.css')}}" type="text/css">
    <title>同步英语</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg"><a href="" class="top_a"><img src="/resources/views/home/img/picture.jpg" alt=""
                                                      class="top_img">
            <p class="top_index">中小学同步英语</p></a>
    </div>
    <a href="{{asset('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt="" class="top_user"></a>
</nav>
<section id="Grade">
    <div class="container" style="margin-top: 30px;">
        <div class="col-md-4 index">
            @if(session('grade_id')== null ||session('level_id')== null||session('textbook_id')== null)
                <a href="{{asset('/listen_conf')}}" class="btn btn-primary " role="button" target="_top">
                    <img src="/resources/views/home/img/listen.png" class="img-responsive" id="img_listen">
                    <p class="word_title">同步听力</p>
                </a>
            @else
                <?php $id = session('textbook_id'); ?>
                <a href="http://english.hd/top_listen/{{$id}}" class="btn btn-primary" role="button" target="_top">
                    <img src="/resources/views/home/img/listen.png" class="img-responsive" id="img_listen">
                    <p class="word_title">同步听力</p>
                </a>
            @endif
        </div>
        <div class="col-md-4 index">
            @if(session('grade_id')== null ||session('level_id')== null||session('textbook_id')== null)
                <a href="{{asset('/word_conf')}}" class="btn btn-primary " role="button" target="_top">
                    <img src="/resources/views/home/img/ABC.png" class="img-responsive" id="img_word">
                    <p class="word_title">单词学习</p>
                </a>
            @else
                <?php $id = session('textbook_id'); ?>
                <a href="http://english.hd/word/{{$id}}" class="btn btn-primary" role="button" target="_top">
                    <img src="/resources/views/home/img/word_learn.png" class="img-responsive" id="img_word">
                    <p class="word_title ">单词学习</p>
                </a>
            @endif
        </div>
        <div class="col-md-4 index">
            @if(session('grade_id')== null ||session('level_id')== null||session('textbook_id')== null)
                <a href="{{url('/train_conf')}}" class="btn btn-primary " role="button" target="_top">
                    <img src="/resources/views/home/img/word_train.png" class="img-responsive" id="img_word">
                    <p class="word_title">单词训练</p>
                </a>
            @else
                <?php $id = session('textbook_id'); ?>
                <a href="http://english.hd/train/{{$id}}" class="btn btn-primary" role="button" target="_top">
                    <img src="/resources/views/home/img/train.png" class="img-responsive" id="img_word">
                    <p class="word_title">单词训练</p>
                </a>
            @endif

        </div>
        <div class="col-md-4 index">
            <a href="" class="btn btn-primary" id="index_listen" role="button" target="_top">
                <img src="/resources/views/home/img/reward.png" class="img-responsive" id="img_listen">
                <p class="word_title">奖励</p>
            </a>
        </div>
    </div>
</section>

</body>
</html>