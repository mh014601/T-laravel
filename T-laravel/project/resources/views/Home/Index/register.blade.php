<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />


    <title>中意家园网上商城</title>
    <meta name="Keywords" content="中意家园网上商城" />
    <meta name="Description" content="中意家园网上商城" />



    <link href="{{asset('Home/css/style.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('Home/js/jquery.min.js')}}"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <link href="{{asset('Home/css/nav2.css')}}" type="text/css" rel="stylesheet"><!--藏品分类 -->
    <link href="{{asset('Home/css/amazeui.min.css')}}" rel="stylesheet" />
    <script src="{{asset('Home/js/amazeui.min.js')}}"></script>
    <!--手滑效果 -->
    <script type="text/javascript">
        <!--
        var timeout         = 500;
        var closetimer		= 0;
        var ddmenuitem      = 0;

        // open hidden layer
        function mopen(id)
        {
            // cancel close timer
            mcancelclosetime();

            // close old layer
            if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

            // get new layer and show it
            ddmenuitem = document.getElementById(id);
            ddmenuitem.style.visibility = 'visible';

        }
        // close showed layer
        function mclose()
        {
            if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
        }

        // go close timer
        function mclosetime()
        {
            closetimer = window.setTimeout(mclose, timeout);
        }

        // cancel close timer
        function mcancelclosetime()
        {
            if(closetimer)
            {
                window.clearTimeout(closetimer);
                closetimer = null;
            }
        }

        // close layer when click-out
        document.onclick = mclose;
        // -->
    </script>
</head>

<body style="background: #f1f1f1;">

<div class="qing juzhong lobg" style="position: absolute;top: 50%;margin-top: -290px; left:50%; margin-left:-600px; overflow:inherit">

    <div class="log-rf" style="float:none; margin:0 auto; height:auto;">
        <form action="{{url('Home/Index/registerAction')}}" method="post" id="form1">
            <div class="logk zcok" style="padding-bottom:40px; margin-bottom:30px;">
                <div class="loto"><img src="{{asset('Home/images/login-t.png')}}" width="145" height="145" class="login-t"><img src="{{asset('Home/images/login-bg.png')}}" width="221" height="247" class="login-bg"></div>
                <div class="lo-dl">
                    <div class="lf">用户名：</div>
                    <input type="text" placeholder="请输入用户名" name="uname" id="uname">
                </div>

                <div class="lo-dl">
                    <div class="lf">密　　码：</div>
                    <input type="password" placeholder="请输入密码" name="upass" id="upass">
                </div>
                <div class="lo-dl">
                    <div class="lf">确认密码：</div>
                    <input type="password" placeholder="请确认密码" name="repass" id="repass">
                </div>
                <div class="lo-dl">
                    <div class="lf">手 机 号：</div>
                    <input type="text"  placeholder="请输入手机号" name="phone" id="phone" style="width: 200px;border: 1px solid #ff5777">
                    <div><button style="width: 80px;height: 37px;background: lightskyblue" id="sendSms">发送短信</button></div>

                </div>
                <div class="lo-dl">
                    <div class="lf">邮箱：</div>
                    <input type="text"  placeholder="请输入邮箱" name="email" id="email" style="width: 200px;border: 1px solid #ff5777" >
                    <div><button style="width: 80px;height: 37px;background: lightskyblue" id="sendEmail">发送邮件</button></div>
                </div>
                <div>
                    <input type="submit" value="注册" class="dlan" id="reg">

                </div>

                <div class="lo-zc">
                    已经注册账号？　　<a href="#" class="lo-zc1">立即登录</a>
                </div>
            </div>
            {{csrf_field()}}
        </form>

    </div>
</div>
<script>
    //发送短信
    $('#sendSms').click(function () {
        var phone = $('#phone').val();
        $.get("{{url('Home/Index/sendSms')}}",{phone:phone},function (data) {
            if(data.status){
                alert('发送成功...');
            }
        },'json')
    });
    $('#sendEmail').click(function () {
        var email = $('#email').val();
        var email_reg = /^[\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/;

        if(!email_reg.test(email)){
            alert("邮箱格式不正确")
            return false;
        }else{
            $.get("{{url('Mail/send')}}",{email:email},function (data) {
                if(data.status){
                    alert('发送成功...');
                }
            },'json')
        }
    })
</script>
<script>
   // $('#reg').click(function () {
   //     // jquery获取 正则验证
   //     var uname = $('#uname').val();
   //     var reg_uname = /^[a-z][a-z0-9A-Z_]{2,9}$/;
   //     if(!reg_uname.test(uname)){
   //         alert("用户名规则不正确");
   //         return false;
   //     }
   //     alert("hello");
   //     // $.post(url,{},function(){
   //     //     alert()
   //     //     location.href = "";
   //     // },'json')
   // })
</script>
<script>
    $('#form1').validate({
        rules:{
            uname:{
                required:true
            },
        },
        messages:{
            uname:{
                required:'用户名必填'
            }
        }
    });
</script>
{{--<script>
    $('#reg').css({'background-color':'#999','cursor':'not-allowed'}).attr('disabled','disabled');
    var uname_flag = false;
    var upass_flag = true;
    var urepass_flag = true;
    var phone_flag = false;
    $('#uname').blur(function () {
        var uname = $(this).val();
        var reg_uname = /^[a-z][a-z0-9A-Z_]{2,9}$/;
        if(!reg_uname.test(uname)){
            alert("用户名规则不正确");
        }else{
            // ajax
            // 用户名格式正确的前提下，验证是否存在
            $.post('{{url("Home/Index/ajax_checkUname")}}',{uname:uname},function (data) {

                uname_flag = true;
                if(uname_flag && upass_flag && urepass_flag && phone_flag){
                    $('#reg').css({'background-color':'#f00','cursor':'pointer'}).removeAttr('disabled');
                }
            },'json');

        }

    })


    $('#phone').blur(function () {
        var uname = $(this).val();
        var reg_uname = /^\d{11}$/;
        if(!reg_uname.test(uname)){
            alert("手机号格式不正确");
        }else{
            phone_flag = true;
            if(uname_flag && upass_flag && urepass_flag && phone_flag){
                $('#reg').css({'background-color':'#f00','cursor':'pointer'}).removeAttr('disabled');
            }
        }

    })
</script>--}}
</body>
</html>
