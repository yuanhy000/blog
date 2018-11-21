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
    <title>配置信息</title>
</head>
<body>
<section id="textbook">
    <div style="padding: 0px 15px">
        <div class="col-md-12">
            <p class="chose">选择教材：</p>
        </div>
        <div class="col-md-12">
            @foreach($textbook as $t)
                @if(session('condition')=='listen')
                    <a href="{{url('top_listen/'.$t->text_id)}}" class="btn btn-primary" id="text_a" role="button"
                       target="_top">
                        <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                        <p class="text_name">{{$t->text_name}}</p>
                    </a>
                @elseif(session('condition')=='phrase')
                    <a href="{{url('top_phrase/'.$t->text_id)}}" class="btn btn-primary" id="text_a" role="button"
                       target="_top">
                        <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                        <p class="text_name">{{$t->text_name}}</p>
                    </a>
                @elseif(session('condition')=='language')
                    <a href="{{url('top_language/'.$t->text_id)}}" class="btn btn-primary" id="text_a" role="button"
                       target="_top">
                        <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                        <p class="text_name">{{$t->text_name}}</p>
                    </a>
                @elseif(session('condition')=='train')
                    @if(session('state')=='find_mean')
                        <a href="{{url('top_find_mean/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                        @elseif(session('state')=='watch_spell')
                        <a href="{{url('top_watch_spell/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                        @elseif(session('state')=='listen_spell')
                        <a href="{{url('top_listen_spell/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>@elseif(session('state')=='total')
                        <a href="{{url('top_total/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                    @else
                        <a href="{{url('train/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                    @endif

                @elseif(session('condition')=='word')
                    @if(session('state')=='explain')
                        <a href="{{url('top_word/'.$t->text_id)}}" class="btn btn-primary" id="text_a" role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                    @elseif(session('state')=='self')
                        <a href="{{url('top_self/'.$t->text_id)}}" class="btn btn-primary" id="text_a" role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                    @else
                        <a href="{{url('word/'.$t->text_id)}}" class="btn btn-primary" id="text_a"
                           role="button"
                           target="_top">
                            <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                            <p class="text_name">{{$t->text_name}}</p>
                        </a>
                    @endif

                @elseif(session('condition')== null)
                    <a href="{{url('/')}}" class="btn btn-primary" id="text_a" role="button"
                       target="_top">
                        <img src="{{url($t->text_thumb)}}" class="img-responsive" id="text_thumb">
                        <p class="text_name">{{$t->text_name}}</p>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>

</body>
</html>