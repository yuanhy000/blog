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
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <title>短语详解</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/train_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{$topic->top_name}}</p>
            </a>
                <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt=""
                                                                 class="top_user"></a>
        </span>
    </div>
</nav>
<section>
    <div class="container" id="con_bottom2" style="margin-left: 0px;">
        <div>
            <div align="center">
                <a role="button">
                    <video id="videoPlay_2" width="14%" src="{{url($total[$id]->ls_pro)}}"
                           poster="/resources/views/home/img/play.png" loop="loop" x-webkit-airplay="true"
                           webkit-playsinline="true">
                    </video>
                </a>
            </div>
            <form name="form">
                <p align="center">
                    <input name="text" class="input_box">
                </p>
                <p align="center">
                    <input class="input_abc" type="button" name="B1" value="Q" OnClick="q()">
                    <input class="input_abc" type="button" name="B2" value="W" OnClick="w()">
                    <input class="input_abc" type="button" name="B3" value="E" OnClick="e()">
                    <input class="input_abc" type="button" name="B4" value="R" OnClick="r()">
                    <input class="input_abc" type="button" name="B5" value="T" OnClick="t()">
                    <input class="input_abc" type="button" name="B6" value="Y" OnClick="y()">
                    <input class="input_abc" type="button" name="B7" value="U" OnClick="u()">
                    <input class="input_abc" type="button" name="B8" value="I" OnClick="i()">
                    <input class="input_abc" type="button" name="B9" value="O" OnClick="o()">
                    <input class="input_abc" type="button" name="B10" value="P" OnClick="p()">
                </p>
                <p align="center">
                    <input class="input_abc" type="button" name="B11" value="A" OnClick="a()">
                    <input class="input_abc" type="button" name="B12" value="S" OnClick="s()">
                    <input class="input_abc" type="button" name="B13" value="D" OnClick="d()">
                    <input class="input_abc" type="button" name="B14" value="F" OnClick="f()">
                    <input class="input_abc" type="button" name="B15" value="G" OnClick="g()">
                    <input class="input_abc" type="button" name="B16" value="H" OnClick="h()">
                    <input class="input_abc" type="button" name="B17" value="J" OnClick="j()">
                    <input class="input_abc" type="button" name="B18" value="K" OnClick="k()">
                    <input class="input_abc" type="button" name="B19" value="L" OnClick="l()">
                </p>
                <p align="center">
                    <input class="input_abc" type="button" name="B20" value="Z" OnClick="z()">
                    <input class="input_abc" type="button" name="B21" value="X" OnClick="x()">
                    <input class="input_abc" type="button" name="B22" value="C" OnClick="c()">
                    <input class="input_abc" type="button" name="B23" value="V" OnClick="v()">
                    <input class="input_abc" type="button" name="B24" value="B" OnClick="b()">
                    <input class="input_abc" type="button" name="B25" value="N" OnClick="n()">
                    <input class="input_abc" type="button" name="B26" value="M" OnClick="m()">
                </p>
                <p align="center">
                    <input class="input_space" type="button" name="B27" value="空格" OnClick="space()">
                    <input class="input_other" type="button" name="B28" value="退格" OnClick="del()">
                    <input class="input_other" type="button" name="B28" value="清空" OnClick="del_all()">
                </p>
                <p align="center">
                    <input class="input_end" type="button" value="查看答案" onclick="result()">
                    <input class="input_end" type="button" value="确认" onclick="judge()">
                </p>
            </form>
        </div>
    </div>
    <div class="container">
        @if($id == 1)

            <a href="{{url('total_all/'.$topic->top_id.'_'.$id)}}" target="_top"
               class="btn btn-primary"
               id="word_left2"
               role="button">None</a>
        @else
            <?php $n = $id - 1?>
            <a href="{{url('total_all/'.$topic->top_id.'_'.$n)}}" target="_top"
               class="btn btn-primary"
               id="word_left2"
               role="button"><span class="glyphicon glyphicon-arrow-left" style="color: #666;">　</span>previous</a>
        @endif
        @if($id==18)
            <a href="{{url('total_all/'.$topic->top_id.'_'.$id)}}" target="_top"
               class="btn btn-primary"
               id="word_right2"
               role="button">None</span></a>
        @else
            <?php $m = $id + 1?>
            <a href="{{url('total_all/'.$topic->top_id.'_'.$m)}}" target="_top"
               class="btn btn-primary"
               id="word_right2"
               role="button">next one&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"
                                                             style="color: #666;"></a>
        @endif
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
                <a href="{{url('top_total/'.$get_text_id->text_id)}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
        </div>
    </div>
</section>
<script>
    function check(flag) {
        if (flag == 1) {
            layer.msg('&nbsp;right!&nbsp;&nbsp;&nbsp;选择正确！', {icon: 6, time: 1500});

            window.setInterval(function () {
                window.location.href = "{{url('total_all/'.$topic->top_id.'_'.session('next'))}}";
            }, 1500);

        }
        else {
            layer.msg('&nbsp;wrong!&nbsp;&nbsp;&nbsp;选择错误！', {icon: 5, time: 1500});
        }
    }
</script>
<script>

    video = document.getElementById("videoPlay_2");
    video.onclick = function () {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
    }
</script>
<?php if ($id<18)session(['next' => $id + 1])?>

<script>
    function a() {
        var text = document.form.text.value;
        document.form.text.value = text + "a";
    }

    function b() {
        var text = document.form.text.value;
        document.form.text.value = text + "b";
    }

    function c() {
        var text = document.form.text.value;
        document.form.text.value = text + "c";
    }

    function d() {
        var text = document.form.text.value;
        document.form.text.value = text + "d";
    }

    function e() {
        var text = document.form.text.value;
        document.form.text.value = text + "e";
    }

    function f() {
        var text = document.form.text.value;
        document.form.text.value = text + "f";
    }

    function g() {
        var text = document.form.text.value;
        document.form.text.value = text + "g";
    }

    function h() {
        var text = document.form.text.value;
        document.form.text.value = text + "h";
    }

    function i() {
        var text = document.form.text.value;
        document.form.text.value = text + "i";
    }

    function j() {
        var text = document.form.text.value;
        document.form.text.value = text + "j";
    }

    function k() {
        var text = document.form.text.value;
        document.form.text.value = text + "k";
    }

    function l() {
        var text = document.form.text.value;
        document.form.text.value = text + "l";
    }

    function m() {
        var text = document.form.text.value;
        document.form.text.value = text + "m";
    }

    function n() {
        var text = document.form.text.value;
        document.form.text.value = text + "n";
    }

    function o() {
        var text = document.form.text.value;
        document.form.text.value = text + "o";
    }

    function p() {
        var text = document.form.text.value;
        document.form.text.value = text + "p";
    }

    function q() {
        var text = document.form.text.value;
        document.form.text.value = text + "q";
    }

    function r() {
        var text = document.form.text.value;
        document.form.text.value = text + "r";
    }

    function s() {
        var text = document.form.text.value;
        document.form.text.value = text + "s";
    }

    function t() {
        var text = document.form.text.value;
        document.form.text.value = text + "t";
    }

    function u() {
        var text = document.form.text.value;
        document.form.text.value = text + "u";
    }

    function v() {
        var text = document.form.text.value;
        document.form.text.value = text + "v";
    }

    function w() {
        var text = document.form.text.value;
        document.form.text.value = text + "w";
    }

    function x() {
        var text = document.form.text.value;
        document.form.text.value = text + "x";
    }

    function y() {
        var text = document.form.text.value;
        document.form.text.value = text + "y";
    }

    function z() {
        var text = document.form.text.value;
        document.form.text.value = text + "z";
    }

    function space() {
        var text = document.form.text.value;
        document.form.text.value = text + " ";
    }

    function del() {
        var text = document.form.text.value;
        text = text.substr(0, text.length - 1);
        document.form.text.value = text;
    }

    function del_all() {
        var text = document.form.text.value;
        text = "";
        document.form.text.value = text;
    }

    function judge() {
        var text = document.form.text.value;
        if (text == '{{$total[$id]->ls_name}}') {
            layer.msg('&nbsp;right!&nbsp;&nbsp;&nbsp;回答正确！', {icon: 6, time: 1500});
            window.setInterval(function () {
                window.location.href = "{{url('total_all/'.$topic->top_id.'_'.session('next'))}}";
            }, 1500);
        } else {
            layer.msg('&nbsp;wrong!&nbsp;&nbsp;&nbsp;回答错误！', {icon: 5, time: 1500});
        }
    }

    function result() {
        var result = '{{$total[$id]->ls_name}}';
        layer.msg('正确答案：' + result, {icon: 6, time: 1500});
    }
</script>
</body>
</html>