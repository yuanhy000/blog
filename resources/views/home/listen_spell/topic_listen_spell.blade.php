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
    <title>章节目录</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/train_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{session('grade_name')}}&nbsp;&nbsp;{{session('level_name')}}
                    &nbsp;&nbsp;{{session('textbook_name')}}</p>
            </a>
            <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" class="top_user"></a>
        </span>
    </div>
</nav>
<section id="Topic">
    <div class="container">
        <div class="col-md-12">
            <p><span class="glyphicon glyphicon-book" style="color: #666;"></span>&nbsp;&nbsp;&nbsp;单元列表</p>
        </div>
        <div class="col-md-12">
            @foreach($topic as $t)
                <a  href="{{url('listen_spell_all/'.$t->top_id.'_'. $top_ls[$t->top_id]["ls_id"])}}"  class="btn btn-primary" id="topic" role="button"
                   target="_top"><span>{{$t->top_name}}</span></a>
            @endforeach
        </div>
    </div>
</section>
<section>
    <div class="col-md-12" style="padding: 0;">
        <div class="container" style="padding: 0;">
            <div class="col-md-6">
                <a href="{{url('train/'.$get_text_id["text_id"])}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
            <div class="col-md-6">
                <a href="{{url('/train_conf')}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">设置教材</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>