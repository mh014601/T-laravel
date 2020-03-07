<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品列表页</title>
    <link href="{{asset('Admin/css/app.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('Admin/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/select-ui.min.js')}}"></script>


</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <!-- 搜索 -->
            <form action="{{url('Admin/Goods/goodsList')}}" method="post">
            <ul class="seachform">
                <input type="hidden" value="search" name="search">
                {{csrf_field()}}
                <li>
                    <label>综合查询</label>
                    <input name="keyword" type="text" class="scinput" value="{{$keyword}}" />
                </li>
                <li>
                    <label>分类</label>
                    <div class="vocation" style="width: 200px;">
                        <select class="select3" name="cate_id" style="width: 200px">
                            <option value="0">全部</option>
                            @foreach($cateList as $cate)
                            <option value="{{$cate->id}}"
                            @if($cate_id == $cate->id)
                            selected
                                    @endif
                            > |--{{str_repeat("--",substr_count($cate->path,','))}}
                                {{$cate->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input name="" type="submit" class="scbtn" value="查询"/>
                </li>
            </ul>
            </form>
            <!-- 列表 -->
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="{{asset('Admin/images/px.gif')}}" /></i></th>
                    <th>商品名称</th>
                    <th>所属分类</th>
                    <th>商品描述</th>
                    <th>商品图片</th>
                    <th>价格</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>

                @forelse($rows as $v)
                <tr id="id_{{$v->gid}}">
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td>{{$v->gid}}</td>
                    <td>{!!  showBeauti($keyword,$v->goods_name)!!}</td>
                    <td>{{$v->cate_name}}</td>
                    <td>{!!  $v->goods_detail !!}</td>
                    <td><img src='{{asset("upload/$v->goods_pic")}}' alt="" width="50"></td>
                    <td>{{$v->goods_price}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
                    <td>
                        <a href="{{url('Admin/Goods/goodsEdit',[$v->gid])}}" class="tablelink" >编辑</a>
                        <a href="javascript:void(0)" class="tablelink" onclick="goodsDel({{$v->gid}})">删除</a>
                    </td>
                </tr>
                    @empty

                    <tr>
                        <td colspan="8"> 没有数据</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- 分页 -->
            <div class="pagin">
                <div class="message">共<i class="blue">{{$rows->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$rows->currentPage()
}}&nbsp;</i>页</div>
                <ul class="paginList">
                   {{$rows->appends(['keyword' => $keyword,'search'=>$search,'cate_id'=>$cate_id])->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function goodsDel(id){
        var bool = confirm("确定要删除吗？")
        if(bool){
            var _token = '{{csrf_token()}}'
            //删除
            // 1.效果
            $('#id_'+id).remove();
            // 2.删除数据库
            $.post("{{url('Admin/Goods/ajaxGoodsDel')}}",{id:id},function (data) {
                if(data.status ==1){
                    alert("删除成功")
                }
            },'json')
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({
            width : 345
        });
        $(".select2").uedSelect({
            width : 167
        });
        $(".select3").uedSelect({
            width : 100
        });
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    });
</script>
</html>
