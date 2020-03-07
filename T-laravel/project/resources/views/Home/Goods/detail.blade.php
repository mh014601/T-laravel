@include('Home/Public/header')
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2454345235&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:137647337:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
<div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
<!--页面标题 -->
<div class="qing juzhong prbg">
    <div class=" lf pro" style="width:410px;margin-left:20px;margin-right:30px;overflow: initial;">
        <!--演示内容开始-->
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="{{asset("/upload/$goods->goods_pic")}}" title="Images" class="MagicZoom" id="MagicZoom"><img width="300" height="300" src="{{asset("/upload/$goods->goods_pic")}}" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img height="42" width="42" src='{{asset("/upload/$goods->goods_pic")}}' tsImgS="{{asset("/upload/$goods->goods_pic")}}" /></li>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="{{asset('Home/images/loading.gif')}}" alt="Loading..." />
        </div>
        <script src="{{asset('Home/js/MagicZoom.js')}}" type="text/javascript"></script>
        <script src="{{asset('Home/js/ShopShow.js')}}"></script>
        <!--演示内容结束-->
    </div>
    <style>
        .guige{ width:100%; overflow:hidden; margin-bottom:10px;}
        .guige a{ float:left; width:80px; line-height:30px; border:1px solid #ccc; color:#555; margin:0 5px 5px 0px; text-align:center;}
        .guige a:hover{border:1px solid #e01222; color:#e01222;}
    </style>
    <div class="lf pryo">
        <div class="pr-ti">{{$goods->goods_name}} <span>{{$goods->hit}}</span></div>
        <div class="pr-jgk">
            <div class="pr-jti">
                <b>价格：</b>￥{{$goods->goods_price}}        <strong>已售0件</strong>
            </div>
            <div class="pr-jck">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td width="120"><div class="pr-jc"><div class="cuk">现</div><div class="pr-jcf"><span>现金</span>元</div></div></td>
                        <td width="140"><div class="pr-jc"><div class="cuk">优</div><div class="pr-jcf">优惠券<span>10%</span>比例</div></div></td>
                        <td><div class="pr-jc"><div class="cuk">代</div><div class="pr-jcf">代金券<span>1000.00</span>元</div></div></td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <div class="qing">
            <div class="guige"><span class="lf sul">规　　格：</span><a href="">3克</a><a href="">5克</a><a href="">10克</a><a href="">15克</a></div>
            <span class="lf sul">数　　量：</span><div class="lf">
                <div class="gw-sl0">
                    <a href="javascript:void(0)" class="gw-sl1 lf" onclick="mul()">-</a>
                    <input name="shuliang" id="order_num" value="1" readonly>
                    <a href="javascript:void(0)" class="gw-sl2 rf" onclick="add()">+</a>
                </div>
            </div>
        </div>
        <div class="pr-jia">
            <a href="javascript:void(0)" class="jiaj" onclick="addCart({{$goods->id}})">
                <span>加入购物车</span>
                <span>加入购物车</span>
            </a>
            <script>
                // 加
                function add(){
                    // 改变值
                    $('#order_num').val( parseInt($('#order_num').val())+1);
                }

                // 减
                function mul(){
                    var num =parseInt($('#order_num').val());
                    if( num >1){
                        num--;
                    }
                    // 改变值
                    $('#order_num').val(num );
                }
                // 第一种情况,用户如果没有登录,跳转登录页面
                //             用户已经登录,则添加商品到购物车
         /*    function addCart(id){

                    var num = parseInt($('#order_num').val());
                    $.post("{{url('Home/Goods/ajaxAddCart')}}",{id:id,num:num},function(d){
                                if(d.status == 0){
                                    alert('添加购物车成功');
                                    // 跳转到购物车页面

                                    location.href = "{{url('Home/Goods/cart')}}"
                                }else if(d.status == 1){
                                    alert('商品添加失败')
                                }else{
                                    alert("清登录")
                                    // 跳登录
                                    location.href = "{{url('Home/Index/login')}}?returnUrl={{$current_url}}"
                                }
                    },'json')
                }*/

                // 第二种情况,如果用户没有登录,添加商品到session,用户登录成功后,将session数据转移到购物车表
                 //           如果用户已经登录,则添加商品到购物车

                function addCart(id){
                    var num = parseInt($('#order_num').val());
                    $.post("{{url('Home/Goods/ajaxAddCart')}}",{id:id,num:num},function(data){
                                if(data.status == 1){
                                    location.href = "{{url('Home/Goods/cart')}}";
                                }
                    },'json')
                }
            </script>

            <!--<a href="#" class="jias jiasnn"><img src="{{asset('Home/images/xing2.png')}}" width="45" height="41" class="lf">收藏</a> -->
            <a href="#" class="jias"><img src="{{asset('Home/images/kefu.png')}}" width="45" height="41" class="lf" data-bd-imgshare-binded="1">客服</a>
        </div>
    </div>
    <div class="baidushare">
        <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1510793623007">
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            <a href="#" class="bds_more" data-cmd="more" title="更多分享方式"></a>
        </div>
    </div>

</div>
<!--会员内容 -->
<div class="qing juzhong">
    <div class="lf tu-prk">
        <div class="tu-pr">
            <div class="tu-pr-ti">
                <a href="product-view.php?id=932#q1" name="q1" class="tinn">图文详情</a>

            </div>
            <div class="qing cpxk shu12">
                <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;">【藏品名称】2017-1 丁酉年鸡 赠送小版</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;">【整张枚数】4枚（2套）</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;">【整张规格】120*160mm</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal;">【印 制 厂】北京邮票厂</p><p><br></p>      </div>
        </div>



    </div>
    <div class="rf tuik">
        <div class="tui-ti">为您推荐</div>
        <div class="qing">
            <dl class="dhlb">
                <dd>
                    <a href="product-view.php?id=932" class="jftu"><img src="{{asset('Home/images/1078341009.jpg')}}" width="184" height="184" data-bd-imgshare-binded="1"></a>
                    <div class="qing jfm">
                        <a href="product-view.php?id=932">2017-1 丁酉年(鸡赠送版)</a>
                    </div>
                    <div>
                        <div class="jiag">￥20.00</div>
                        <a href="javascript:add_cart('932');" class="mai"><span>立即购买</span><span>立即购买</span></a>
                    </div>
                </dd>
                <dd>
                    <a href="product-view.php?id=931" class="jftu"><img src="{{asset('Home/images/3361002146.jpg')}}" width="184" height="184" data-bd-imgshare-binded="1"></a>
                    <div class="qing jfm">
                        <a href="product-view.php?id=931">2016-1 丙申年猴（猴赠送版）</a>
                    </div>
                    <div>
                        <div class="jiag">￥40.00</div>
                        <a href="javascript:add_cart('931');" class="mai"><span>立即购买</span><span>立即购买</span></a>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div>
</div>


<div class="qing banq">所有图片均受著作权保护，未经许可任何单位与个人不得使用、复制、转载、摘编，违者必究法律责任 。</div>
<div class="qing banq" style="margin-bottom:20px;">鲁ICP备15028488号Copyright 中意商城2017，All Rights Reserved</div>
</body>
</html>
