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
<section id="Level">
    <div style="padding: 0px 15px">
        <div class="col-md-12">
            <p>选择册序：</p>
        </div>
        <div class="col-md-12">
            @foreach($submenu as $s)
                <a title="" href="{{url('text/'.$s->cate_id)}}" target="text" class="btn btn-primary" id="level" role="button" onclick="">{{$s->cate_name}}</a>
            @endforeach
        </div>
    </div>
</section>

<section id="cate_other">
    <div style="padding: 0px">
        <div class="col-md-12" style="padding: 0px">
            <iframe scrolling="no"  id="main" src="" frameborder="0" width="100%" height="100%" name="text" class="other_k" style="min-height:300px;"></iframe>
        </div>
    </div>
</section>

<script>
    // 计算页面的实际高度，iframe自适应会用到
    function calcPageHeight(doc) {
        var cHeight = Math.max(doc.body.clientHeight, doc.documentElement.clientHeight)
        var sHeight = Math.max(doc.body.scrollHeight, doc.documentElement.scrollHeight)
        var height  = Math.max(cHeight, sHeight)
        return height
    }
    //根据ID获取iframe对象
    var ifr = document.getElementById('main')
    ifr.onload = function() {
        //解决打开高度太高的页面后再打开高度较小页面滚动条不收缩
        ifr.style.height='0px';
        var iDoc = ifr.contentDocument || ifr.document
        var height = calcPageHeight(iDoc)
        if(height < 850){
            height = 850;
        }
        ifr.style.height = height + 'px'
    }
</script>
</body>
</html>