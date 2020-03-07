<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />


    <title>山东省瑞丹堂电子商务有限公司</title>
    <meta name="Keywords" content="山东省瑞丹堂电子商务有限公司" />
    <meta name="Description" content="山东省瑞丹堂电子商务有限公司" />


    <link href="{{asset('Home/css/style.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('Home/js/jquery.min.js')}}"></script>
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

<body>
<div class="qing tok">
    <div class="juzhong">
        <div class="lf" style="margin-left: 240px;">
            欢迎来到山东省瑞丹堂电子商务有限公司！
        </div>
        <div class="rf toa">
            <ul id="sddm">
                <li style="padding-left:10px; background:url({{asset('Home/images/wei.png')}}) no-repeat left center; background-size:18px;"><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">关注我们</a></a>
                    <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                        <img src="{{asset('Home/images/108430aeb.jpg')}}" width="166" height="166">
                    </div>
                </li>
                <li style="padding-left:10px; background:url({{asset('Home/images/gwc.png')}}) no-repeat left center; background-size:16px;"><a href="#">购物车</a><span>|</span></a>
                </li>
                <a href="#">会员中心</a><span>|</span><a href="#">联系我们</a>
            </ul>
        </div>
    </div>
</div>
<!--logo -->
<div class="qing lok">
    <div class="juzhong">
        <div style="height:140px; background-color: #fff; box-shadow: 0 -12px 10px rgba(0,0,0,.2);width: 216px; float:left; position:absolute; top:0;">
            <div>
                <img src="{{asset('Home/images/jinyihe.png')}}" style="height:140px; padding:0;margin: 0 auto;display: block;">
            </div>
        </div>
        <div class="rf">
            <form name="search" action="#" method="post" style="display:inline; float:left; width:500px;">
                <div class="souk">
                    <input type="text" name="gjz" id="gjz" placeholder="请输入关键字" class="sous">
                    <div class="sout">
                        <a href="#">日用品</a>，                <a href="#">保健</a>
                    </div>
                    <input type="submit" value="" class="souc">
                </div>
                <div style="float:left; font-size:12px; margin-top:10px;" >
                    <a href="" style=" color:#999;">服装鞋帽</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">保健用品</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">电子产品</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">日用品</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">办公用品</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">化妆品</a><span style="margin:0 5px; color:#999;">|</span>
                    <a href="" style=" color:#999;">预包装食品</a>
                </div>
            </form>
            <div class="myk">
                <div class="phone">
                    <p class="time">
                        客户服务热线：
                    </p>
                    <p class="tel" style="color:#464646; font-size:22px; font-weight:bold;">
                        0538-0000000
                    </p>
                </div>
                <img src="{{asset('Home/images/ewm.jpg')}}" width="80" style="float:right;">
            </div>
        </div>
    </div>
</div>
<!--导航 -->
<div class="qing dabg" style=" overflow:visible;">
    <div class="juzhong" style=" overflow:visible;">
        <div class="lf fenl">
            <!--分类 -->
            <div id="category-2015" onmouseover="this.className='on'" onmouseleave="this.className=''">
                <div class="ld">
                    <img src="{{asset('Home/images/flbg.png')}}" width="21" height="15" class="lf">所有产品分类
                </div>
                <div id="allsort" style=" display:block;">
                    @foreach($rows as $v)
                    <div class="item" onmouseover="this.className='item on'" onmouseleave="this.className='item'">
                        <span><a href="{{url('/Home/Cate/cateList',[$v->id])}}">{{$v->cate_name}}</a><b>></b></span>
                        <div class="i-mc">
                            <div class="ejbox">
                                <a href="#">专科用药<b>&gt;</b></a>
                                <a href="#">滋补养生<b>&gt;</b></a>
                                <a href="#">膳食补充<b>&gt;</b></a>
                                <a href="#">健康监测<b>&gt;</b></a>
                                <a href="#">靓眼视界<b style="font-family:'宋体'">&gt;</b></a>

                            </div>
                            @forelse($v->son as $v1)
                            <div class="ejlei">
                                <a href="{{url('/Home/Cate/cateList',[$v1->id])}}" class="ejlei1">{{$v1->cate_name}}<b style="font-family:'宋体'; margin-left:5px;">&gt;</b></a>
                                <div class="ejlei2">
                                    @forelse($v1->son as $v2)
                                    <a href="{{url('/Home/Cate/cateList',[$v2->id])}}" class="cate_detail_con_lk" target="_blank">
                                        {{$v2->cate_name}}
                                    </a>
                                    @empty
                                    没有数据
                                        @endforelse
                                </div>
                            </div>
                                @empty
                                没有数据
                                @endforelse
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
            <!--分类end -->
        </div>
        <div class="rf nav">
            <a href="#">
                <div>
                    <span>首页</span><span>首页</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>关于我们</span><span>关于我们</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>普通会员</span><span>普通会员</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>运营商</span><span>运营商</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>商城网店</span><span>商城网店</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>网店分红</span><span>网店分红</span>
                </div>
                <b></b></a>
            <a href="#">
                <div>
                    <span>会员中心</span><span>会员中心</span>
                </div>
                <b></b></a>

            <a href="#">
                <div>
                    <span>联系我们</span><span>联系我们</span>
                </div>
                <b></b></a>
        </div>

    </div>
</div>
<!--banner -->
<div style="width:100%; overflow:hidden;">
    <div class="qing bank" style="width:1200px; margin:0 auto; overflow:hidden; background:#fff;">
        <div class="kuai">
            <div class="J_user user">
                <div class="user_info user_info_level0 user_info_plusNaN" clstag="h|keycount|2016|09a">
                    <div class="J_user_info_avatar user_info_avatar">
                        <img class="J_user_info_avatar_img" src="{{asset('Home/images/no_login.jpg')}}"><a class="user_info_avatar_lk" href="#" target="_blank"></a>
                    </div>
                    <div class="user_info_show">
                        <p class="user_info_tip">
                            Hi, 欢迎来到瑞丹堂!
                        </p>
                        @if(Session::get('uid'))
                        <p>
                            欢迎你:{{Session::get('uname')}}
                            <br>f
                            <a href="{{url('Home/Index/loginOut')}}">退出</a>
                        </p>
                        @else
                        <p>
                            <a href="{{url('Home/Index/login')}}" class="user_info_login">登录</a><a href="{{url('Home/Index/register')}}" class="user_info_reg">注册</a>
                        </p>
                            @endif

                    </div>
                </div>
                <div class="user_profit">
                    <a class="user_profit_lk" href="#" target="_blank" clstag="h|keycount|2016|09b">新人福利</a><a class="user_profit_lk" href="#" target="_blank" clstag="h|keycount|2016|09c">会员优惠</a>
                </div>
            </div>
            <div class="kuti">
                <div class="kuti1">
                    商城公告
                </div>
                <a href="#" class="duo">更多<span>>></span></a>
            </div>
            <div class="kulb">

                <a href="#">◆&nbsp;&nbsp;居家自营好物2件8折</a>
                <a href="#">◆&nbsp;&nbsp;爆款下单立减1111元</a>
                <a href="#">◆&nbsp;&nbsp;家具建材跨店铺3件8折</a>
                <a href="#">◆&nbsp;&nbsp;每日享折扣 京东品质游</a>
            </div>
            <div class="kusi">

                <a href="#"><img src="{{asset('Home/images/bab1.png')}}" width="38" height="35">会员</a>
                <a href="#"><img src="{{asset('Home/images/bab2.png')}}" width="38" height="35">活动</a>
                <a href="#"><img src="{{asset('Home/images/bab5.png')}}" width="38" height="35">网店</a>
                <a href="#"><img src="{{asset('Home/images/bab6.png')}}" width="38" height="35">购物车</a>
                <a href="#"><img src="{{asset('Home/images/bab3.png')}}" width="38" height="35">资讯</a>
                <a href="#"><img src="{{asset('Home/images/bab7.png')}}" width="38" height="35">简介</a>
                <a href="#"><img src="{{asset('Home/images/bab4.png')}}" width="38" height="35">留言</a>
                <a href="#"><img src="{{asset('Home/images/bab8.png')}}" width="38" height="35">联系</a>
            </div>
        </div>
        <!--banner -->
        <div class="main_visual">
            <div class="main_image" style="width:790px;margin-left: 225px;margin-top:8px;">
                <div id="slider-wrapper" class="index_post ption_r">
                    <div id="slider" class="nivoSlider">

                        <a href="#" target="_blank">
                            <img src="{{asset('Home/images/banner2.jpg')}}" alt=" "/></a>
                        <a href="#" target="_blank">
                            <img src="{{asset('Home/images/banner3.jpg')}}" alt=" "/></a>
                        <a href="#" target="_blank">
                            <img src="{{asset('Home/images/banner1.jpg')}}" alt=" "/></a>

                        <a href="#" target="_blank">
                            <img src="{{asset('Home/images/banner5.jpg')}}" alt=" "/></a>
                        <a href="#" target="_blank">
                            <img src="{{asset('Home/images/banner4.jpg')}}" alt=" "/></a>
                    </div>
                </div>
                <script src="{{asset('Home/js/load.js')}}" type="text/javascript"></script>
                <script src="{{asset('Home/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
                <script type="text/javascript">
                    $(window).load(function() {
                        $('#slider').nivoSlider({
                            controlNav:false,
                            effect:'random',
                            animSpeed:100,
                            captionOpacity:0.9,
                            directionNav:true,
                            controlNav:true,
                            pauseTime:3000,
                            directionNavHide: true,
                            pauseOnHover:true
                        });
                    });
                </script>
            </div>
        </div>
        <!--end -->
    </div>
</div>

<div class="box_hd clearfix">
    <div class="boxhdcol1">
        <p class="box_hd_dec" style="background-image: url({{asset('Home/images/1x.png')}});background-position: -190px -48px;-moz-background-size: 218px 188px;background-size: 218px 188px;background-repeat: no-repeat;width: 28px;height: 28px; float:left"></p>
        <p class="box_hd_icon" style="margin-top: 8px;margin-right: 8px;background-image: url({{asset('Home/images/1x.png')}});background-position: 0 -40px;-moz-background-size: 218px 188px;background-size: 218px 188px;background-repeat: no-repeat;width: 34px;height: 40px; float:left"></p>
        <h3 class="box_tit" style="font-size: 26px;font-weight: 400;padding-top:0px; color:#fff; float:left;line-height: 48px;float: left;">热销推荐</h3>
        <a href="#" target="_blank" class="box_subtit" style="color:#fff; float:left; line-height:48px; margin-left:10px;">总有你想不到的低价<i class="box_subtit_arrow"></i></a>
    </div>
    <div class="boxhdcol2">
        <div class="J_sk_cd sk_cd"  style="color:#fff; float:right; line-height:48px; margin-right:20px;">
            <span class="sk_cd_tip">当前专区</span>

            <span class="sk_cd_tip">查看更多</span>
        </div>
    </div>
</div>

<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}/*清楚内外默认边距*/
    .web{width:100%;margin:0px auto; background:#e0e0e0;}
    .con{width:1200px;background:#fff;margin:10px auto; overflow:hidden}
    .con ul li{width:400px;height:120px;float:left;margin-right:0px;margin-left:0px;margin-bottom:0px;position:relative;overflow:hidden;cursor:pointer;}
    .txt{width:585px;height:0px;background:rgba(0, 0, 0, 0.05);/*透明背景色，不透明其文字内容*/position:absolute;left:0;bottom:0;color:#fff;font-family:"微软雅黑";}
    .txt h3{font-size:15px;font-weight:100;height:40px;text-align:left;line-height:40px;margin-left:30px;}
    .txt img{ margin-left:30px;margin-top: 20px;}
    .txt p{font-size:14px;text-align:left; width:90%; margin:0 auto; line-height:30px;margin-left:30px;margin-top:10px;}
    .tjmk{ margin-top:15px; }
    .tjmk a{ color:#999; line-height:18px;  width:100%;overflow:hidden !important; font-size:12px; text-align:left;}
    .tjm2{background:#fff; padding-top:10px; font-size:12px; color:#f63;}
</style>

<div class="tabPanelz1" style="width:1200px; margin:0 auto;">
    <div class="panesz1" style=" background:#fff;overflow: hidden;">
        <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
            <ul class="am-slides">
                <li>
                    <div class="panez1" style="display:block;">
                        <div class="qing bai">
                            <div class="lf zgk1">
                                <ul class="zgcplb">
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/1.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/2.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/3.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/4.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/5.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="panez1" style="display:block;">
                        <div class="qing bai">
                            <div class="lf zgk1">
                                <ul class="zgcplb">
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/1.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/2.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/3.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/4.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                    <li><a href="#" class="tjtu"><img src="{{asset('Home/images/5.jpg')}}" width="130" height="130"></a>
                                        <div class="tjmk">
                                            <a href="#" class="tjm1">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>
                                            <div class="tjm2" style="color:#f10214">
                                                ¥<span style="color:#f10214; font-size:18px; font-weight:bold;">89.00</span><em style="margin-left:10px; font-style:normal; color:#999; text-decoration: line-through">¥99.00</em>
                                            </div>
                                        </div>
                                        <div class="tjyc">
                                            <a href="#" class="tjycm">沃盼福建红心柚子新鲜水果2只装重约2-3kg（2只装）</a>

                                        </div>
                                        <!--line-->
                                        <span class="line-1"></span><span class="line-2"></span><span class="line-3"></span><span class="line-4"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
        <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{&quot;directionNav&quot;:false}' style="width:216px; float:right; margin-top:10px; height:250px;">
            <ul class="am-slides">
                <li>
                    <img src="{{asset('Home/images/sban1.jpg')}}" style="width:216px; margin-top:0; height:250px;">
                </li>
                <li>
                    <img src="{{asset('Home/images/sban2.jpg')}}" style="width:216px; margin-top:0; height:250px;">
                </li>

            </ul>
        </div>
    </div>
</div>

<div style="width:1200px; margin:0 auto; overflow:hidden;">
    <img src="{{asset('Home/images/bt.jpg')}}" width="100%">
    <ul style="overflow:hidden;width:800px; float:left; margin-top:10px;" class="jp">
        <li class="entry_item entry_item_1">
            <a class="entry_lk J_log" href="#" target="_blank">
                <div class="entry_bg" style="background:#66B687">
                    <div class="entry_info">
                        <h4 class="entry_info_tit">新品首发</h4>
                        <p class="entry_info_desc">新品享免息~</p>
                    </div>
                </div>
                <img src="{{asset('Home/images/tu1.jpg')}}" data-lazy-img="done" class="entry_img" style="width:390px; height:170px;">
            </a>
        </li>
        <li class="entry_item entry_item_1">
            <a class="entry_lk J_log" href="#" target="_blank">
                <div class="entry_bg" style="background:#e0e271">
                    <div class="entry_info">
                        <h4 class="entry_info_tit">折扣专区</h4>
                        <p class="entry_info_desc">新品享免息~</p>
                    </div>
                </div>
                <img src="{{asset('Home/images/tu2.jpg')}}" data-lazy-img="done" class="entry_img" style="width:390px; height:170px;">
            </a>
        </li>

        <li class="entry_item entry_item_1">
            <a class="entry_lk J_log" href="#" target="_blank">
                <div class="entry_bg" style="background:#b767ad">
                    <div class="entry_info">
                        <h4 class="entry_info_tit">会员专区</h4>
                        <p class="entry_info_desc">新品享免息~</p>
                    </div>
                </div>
                <img src="{{asset('Home/images/tu3.jpg')}}" data-lazy-img="done" class="entry_img" style="width:390px; height:170px;">
            </a>
        </li>
        <li class="entry_item entry_item_1">
            <a class="entry_lk J_log" href="#" target="_blank">
                <div class="entry_bg" style="background:#7cacd6">
                    <div class="entry_info">
                        <h4 class="entry_info_tit">满减促销</h4>
                        <p class="entry_info_desc">新满199元减100元</p>
                    </div>
                </div>
                <img src="{{asset('Home/images/tu4.jpg')}}" data-lazy-img="done" class="entry_img" style="width:390px; height:170px;">
            </a>
        </li>



    </ul>
    <div data-am-widget="slider" class="am-slider am-slider-c2" data-am-slider='{&quot;directionNav&quot;:false}' style="width:395px; right:0; float:right; margin-top:10px;">
        <ul class="am-slides" style="height: 350px;">

            <li style="height: 350px;">
                <img src="{{asset('Home/images/d3.jpg')}}" style="width:395px; height:350px; margin:0;">
                <div class="am-slider-desc">新品首发 新品享免息</div>

            </li>
            <li style="height: 350px;">
                <img src="{{asset('Home/images/d4.jpg')}}" style="width:395px; height:350px; margin:0;">
                <div class="am-slider-desc">新品首发 新品享免息</div>

            </li>
            <li style="height: 350px;">
                <img src="{{asset('Home/images/d2.jpg')}}" style="width:395px; height:350px; margin:0;">
                <div class="am-slider-desc">新品首发 新品享免息</div>

            </li>
            <li style="height: 350px;">
                <img src="{{asset('Home/images/d1.jpg')}}" style="width:395px; height:350px; margin:0;">
                <div class="am-slider-desc">新品首发 新品享免息</div>

            </li>

        </ul>
    </div>

</div>

<div class="web">
    <div class="con">
        <ul>
            <li>
                <img src="{{asset('Home/images/sban5.jpg')}}"/>
                <div class="txt">
                    <h3></h3>
                    <p></p>
                </div>
            </li>
            <li>
                <img src="{{asset('Home/images/sban3.jpg')}}"/>
                <div class="txt">
                    <h3></h3>
                    <p></p>
                </div>
            </li>
            <li>
                <img src="{{asset('Home/images/sban4.jpg')}}"/>
                <div class="txt">
                    <h3></h3>
                    <p></p>
                </div>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(".con ul li").hover(function(){
        $(this).find(".txt").stop().animate({height:"120px"},400);
        $(this).find(".txt h3").stop().animate({paddingTop:"20px"},400);
    },function(){
        $(this).find(".txt").stop().animate({height:"0px"},400);
        $(this).find(".txt h3").stop().animate({paddingTop:"0px"},400);
    })
</script>



<div class="module_row module_row_736727 MOD_ID_260932 has-log-mod"  style="width:1200px; margin:0 auto;">
    <div class="mod_row MCUBE_MOD_ID_260932 J_mod_row_show">
        <div class="lazyData clearfix cateTitleBar yahei" data-ptp="_keyword_32495" data-source-type="" data-source-key="32495" data-manual="true">
            <div class="sideIcon" style="background-color: #7CACEF;"></div>
            <div class="cateTitleName col333">
                医疗保健
            </div>
            <div class="cateLinkBox col666">
                热门搜索：<a class="topLink cube-acm-node col666 has-log-mod" href="#" target="_blank">健康监测</a> |
                <a class="topLink cube-acm-node col666 has-log-mod" href="#" target="_blank">呼吸制氧</a> |
                <a class="topLink cube-acm-node col666 has-log-mod" href="#" target="_blank">养生理疗</a> |
                <a class="topLink cube-acm-node col666 has-log-mod" href="#" target="_blank">康复辅助</a>
            </div>
            <a class="checkMore col666" href="#" target="_blank">查看全部<span class="checkMoreArchor"></span></a>
        </div>
        <div class="floor-con clearfix " data-module-title="男友">
            <!--左边大图-->
            <div class="big-banner-con fl" style="background: #cee2fe; ">
                <!-- 热搜词 -->
                <div class="lazyData big-banner-cate" data-ptp="_keyword_37418" data-source-type="" data-source-key="37418" data-manual="true">
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">康复</a>
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">制氧机</a>
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">保健品</a>
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">滋补品</a>
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">家用医疗</a>
                    <a class="big-banner-hotword fl text-hide" href="#" target="_blank">轮椅</a>
                </div>
                <!-- 文案部分 -->
                <div class="lazyData clearfix fl big-banner-content" data-ptp="_keyword_18883" data-source-type="" data-source-key="18883" data-manual="true">
                    <a rel="nofollow" target="_blank" href="#" class="big-banner-item cube-acm-node yahei has-log-mod">
                        <div class="title title-base bigBanner-color text-hide yahei" style="color: #333;">
                            医疗仪器
                        </div>
                        <div class="sub-title title-base bigBanner-color text-hide yahei" style="color: #666;">
                            特价大促 全场满减
                        </div>
                        <div class="big-banner-img J_dynamic_imagebox J_loading_success" img-src="https://s2.mogucdn.com/mlcdn/c45406/170906_7lgcc369al3dll2l0756cki3474c5_300x300.png')}}">
                            <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj1.png')}}" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <!-- 中部六张图 -->
            <div class="lazyData clearfix fl" data-ptp="_keyword_32496" data-source-type="" data-source-key="32496" data-manual="true">
                <div class="multi-col-con fl">
                    <!-- 中部六张图 -->
                    <div class="multi-pic">
                        <a rel="nofollow" target="_blank" href="{{url('Home/Goods/detail')}}" class="multi-pic-item-2 fl cube-acm-node has-log-mod" data-log-content="3.mce.1_10_1dbqk.32496.0.kJzwcqAUgr5XL.m_310842-pos_0" data-log-index="0" data-ext-acm="3.mce.1_10_1dbqk.32496.0.kJzwcqAUgr5XL.m_310842-pos_0">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj2.jpg')}}" alt="">
                            </div>
                        </a><a rel="nofollow" target="_blank" href="#" class="multi-pic-item-2 fl cube-acm-node has-log-mod">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj3.jpg')}}" alt="">
                            </div>
                        </a>
                        <a rel="nofollow" target="_blank" href="#" class="multi-pic-item-2 fl cube-acm-node has-log-mod">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj4.jpg')}}" alt="">
                            </div>
                        </a>
                        <a rel="nofollow" target="_blank" href="#" class="multi-pic-item-2 fl cube-acm-node has-log-mod">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj5.jpg')}}" alt="">
                            </div>
                        </a>
                        <a rel="nofollow" target="_blank" href="#" class="multi-pic-item-2 fl cube-acm-node has-log-mod">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj1.png')}}" alt="">
                            </div>
                        </a>
                        <a rel="nofollow" target="_blank" href="#" class="multi-pic-item-2 fl cube-acm-node has-log-mod">
                            <div class="top-title text-hide yahei col333" style="">
                                传统滋补
                            </div>
                            <div class="sub-title top-subTitle text-hide yahei col999" style="">
                                人气热销 养生保健
                            </div>
                            <div class="pic-box J_dynamic_imagebox J_loading_success">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj2.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--右边推荐-->
            <!-- 品牌推荐 -->
            <div class="lazyData clearfix fl tofuData" data-ptp="_keyword_31249" data-source-type="" data-source-key="31249" data-manual="true">
                <div class="tofu-col-con fl">
                    <div class="recGoodsTitle yahei fl">
                        大家都在买
                    </div>
                    <div class="changeNew yahei fr">
                        <span class="changeNewAnchor"></span>换一批
                    </div>
                    <div class="tofu-col-con-items">
                        <a class="recSingleGoodsBox clearfix cube-acm-node has-log-mod" href="#" target="_blank">
                            <div class="recGoodsPicBox J_dynamic_imagebox fl J_loading_success" suffix-ratio="1:1">
                                <img class="J_dynamic_img fill_img" src="{{asset('Home/images/bj6.jpg')}}" alt="">
                            </div>
                            <div class="recGoodsInfo yahei">
                                <div class="goodsDesc">
                                    同仁堂燕窝 燕窝盏 一盏一码 马来进口可溯源 孕妇正品燕窝 白燕盏-二
                                </div>
                                <div class="goodsPrice">
                                    ￥1799.00
                                </div>
                                <div class="goodsOriginPrice col999">
                                    ￥1988.00
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="qing tjk3">
    <div class="flf1 juzhong">
        <img src="{{asset('Home/images/bt2.jpg')}}" width="100%" style="margin-bottom:10px;">
        <div class="juzhong">
            <div class="fllb">
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tu.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt1.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt2.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt3.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt4.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt4.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt3.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt2.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt1.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tu.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tu.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt1.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt2.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt3.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt4.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt4.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt3.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt2.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tt1.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <div class="rxk">
                    <a href="#" class="rxcptu"><img src="{{asset('Home/images/tu.jpg')}}" width="215" height="215"></a>
                    <a href="#" class="rxcpm">上海绿源(SHLY) 节能灯 E27 灯泡 白炽灯色  螺旋形 螺旋形8W 色温6500K 白光</a>
                    <div class="rxcpjg">￥<span>36.00</span></div>
                    <div class="yinc">
                        <div class="yjg">￥<span>36.00</span></div>
                        <a href="#" class="ygm"><img src="{{asset('Home/images/che1.png')}}" height="40" class="lf"><div class="lf">购物车</div></a>
                    </div>
                </div>
                <!--列表end -->
            </div>
        </div>
    </div>
</div>

<div class="qing juzhong sik0">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div class="sik" style=" border-left:none;"><img src="{{asset('Home/images/sik1.png')}}" width="55" height="64"><div class="sikm">正品保证</div></div>
                <div class="sik"><img src="{{asset('Home/images/sik2.png')}}" width="55" height="64"><div class="sikm">100%实物拍摄</div></div>
                <div class="sik"><img src="{{asset('Home/images/sik3.png')}}" width="55" height="64"><div class="sikm">实体直营 质优价廉</div></div>
                <div class="sik"><img src="{{asset('Home/images/sik4.png')}}" width="55" height="64"><div class="sikm">每天上新</div></div>
            </td>
        </tr>
    </table>
</div>
<!--fonav -->
<div class="qing juzhong">
    <dl class="fonav">
        <dd>
            <p>配送方式</p>
            <a href="#">订单状态查询</a><a href="#">支付方式说明</a><a href="#">货到付款区域</a>    </dd><dd>
            <p>新手上路</p>
            <a href="#">订购方式</a><a href="#">购物流程</a><a href="#">会员注册</a>    </dd><dd>
            <p>会员中心</p>
            <a href="#">资金管理</a><a href="#">我的收藏</a><a href="#">我的订单</a>    </dd><dd>
            <p>售后服务</p>
        </dd><dd>
            <p>客服中心</p>
            <a href="#">联系方式</a><a href="#">在线客服</a>    </dd>    <dd>
            <p>关于我们</p>
            <a href="#" target="_blank">活动介绍</a>
            <a href="#" target="_blank">会员专区</a>

            <a href="#" target="_blank">我的网店</a>
        </dd>
    </dl>
    <div class="rf hobg"><img src="{{asset('Home/images/hot.png')}}" width="303" height="107"></div>
</div>
<!--友情链接 -->
<div class="qing juzhong youk">
    <div class="lf youkm">友情链接：</div>
    <div class="liana">
        <a href="#" target="_blank"> 山东省瑞丹堂电子商务有限公司</a>　|　<a href="#" target="_blank">山东省瑞丹堂电子商务有限公司</a>　|　<a href="#" target="_blank">山东省瑞丹堂电子商务有限公司</a>　|　<a href="#" target="_blank">诺盾网络</a>　|　<a href="#" target="_blank">诺盾网络</a>    </div>
</div>
<!--版权 -->
<div class="qing banq">
    山东省瑞丹堂电子商务有限公司  版权所有&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank">诺盾网络</a>提供<a href="#" target="_blank">网站建设</a>

</div>





<!--右侧浮动 --><!--导航分类 -->
<script type="text/javascript">
    $(function(){
        $('.tabPanel dl dd').click(function(){
            $(this).addClass('hit').siblings().removeClass('hit');
            $('.panes>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    });
    $(function(){
        $('.tabPanel2 dl dd').click(function(){
            $(this).addClass('hit2').siblings().removeClass('hit2');
            $('.panes2>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    });
    $(function(){
        $('.tabPanel3 dl dd').click(function(){
            $(this).addClass('hit3').siblings().removeClass('hit3');
            $('.panes3>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    })
    $(function(){
        $('.tabPanelcp ul li').click(function(){
            $(this).addClass('hitcp').siblings().removeClass('hitcp');
            $('.panescp>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    })
</script>
</body>
</html>
