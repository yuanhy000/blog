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
    <title>新用户注册</title>
</head>
<body>
<div class="container" id="register_background" style="padding: 0">
    <div class="lvj">
        <div class="row clearfix">
            <div class="col-md-4 column">
            </div>
            <div class="col-md-4 column">
                <h3>
                    新用户注册
                </h3>
                @if(session('_error'))
                    <div class="mark" >
                        <p>{{session('_error')}}</p>
                    </div>
                    <?php session(['_error' => null]);?>
                @endif

                @if(count($errors)>0)
                    <div class="mark">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{url('/register')}}">
                    @csrf
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="text" name="user_name" class="form-control" placeholder="用户名" id="inputName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="email" name="user_email" class="form-control" placeholder="邮箱" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="password" name="user_password" class="form-control" placeholder="密码"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="password" name="user_password_confirmation" class="form-control"
                                   placeholder="确认密码"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default" id="login"><span class="login_button">注册</span></button>
                        </div>
                        <a href="{{url('/')}}" class="btn btn-default" type="submit" id="login"><span  class="login_button">返回首页</span></a>
                    </div>
                </form>
            </div>

            <div class="col-md-4 column">
            </div>
        </div>
    </div>
</div>
</body>
</html>