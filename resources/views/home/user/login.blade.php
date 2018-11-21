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
    <title>用户登录</title>
</head>
<body>
<div class="container" id="register_background" style="padding: 0">
    <div class="lvj">
        <div class="row clearfix">
            <div class="col-md-4 column">
            </div>
            <div class="col-md-4 column">
                <h3>
                    用户登录
                </h3>

                @if(session('msg'))
                    <p class="mark">{{session('msg')}}</p>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{url('/login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="inputEmail" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="email" name="user_email" class="form-control" placeholder="邮箱" id="inputEmail"
                                   required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label"></label>
                        <div class="col-sm-12">
                            <input type="password" name="user_password" id="inputPassword" class="form-control"
                                   placeholder="密码" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label"></label>
                        <div class="col-md-8">
                            <input type="text" id="inputPassword" class="form-control code" name="code"
                                   placeholder="验证码" required>
                        </div>
                        <img src="{{url('admin/code')}}" alt=""
                             onclick="this.src='{{url('admin/code')}}?'+Math.random()" class="login_yanzheng">
                    </div>
                    <button class="btn btn-default" type="submit" id="login"><span class="login_button">登陆</span>
                    </button>
                    <a href="{{url('/register')}}" class="btn btn-default" type="submit" id="login"><span
                                class="login_button">前往注册</span></a>
                    <a href="{{url('/')}}" class="btn btn-default" type="submit" id="login"><span class="login_button">返回首页</span></a>
                </form>
            </div>

            <div class="col-md-4 column">
            </div>
        </div>
    </div>
</div>
</body>
</html>


