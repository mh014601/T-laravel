<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
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
            <ul class="seachform">
                <form action="" method="post">
                    {{csrf_field()}}
                    <li>
                        <label>管理员名称</label>
                        <input name="keyword" type="text" class="scinput" value=""/>
                    </li>
                    <li>
                        <label>指派</label>
                        <div class="vocation">
                            <select class="select3">
                                <option>全部</option>
                                <option>其他</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input name="" type="submit" class="scbtn" value="查询"/>
                    </li>
                </form>
            </ul>

            <!-- 列表 -->
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="{{asset('Admin/images/px.gif')}}" /></i></th>
                    <th>用户</th>


                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @forelse($rows as $v)
                <tr>
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td>{{$v->id}}</td>

                    @if(substr_count($v->path,',') == 1)
                        <td style="color:red">
                            |--{{str_repeat("----",substr_count($v->path,','))}}
                            {{$v->cate_name}}
                        </td>
                    @elseif(substr_count($v->path,',') == 2)
                        <td style="color:green">
                            |--{{str_repeat("----",substr_count($v->path,','))}}
                            {{$v->cate_name}}
                        </td>
                    @else
                        <td style="color:blue">
                            |--{{str_repeat("----",substr_count($v->path,','))}}
                            {{$v->cate_name}}
                        </td>
                    @endif



                    <td>
                        <a href="#" class="tablelink">查看</a>
                        <a href="javascript:void(0)" onclick="delCate(  {{$v->id}})" class="tablelink">删除</a>
                     </td>
                </tr>
                    @empty
                    <tr >
                        <td colspan="5">没有数据</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
            <script>
                function delCate(id){
                    $.post('{{url('Admin/Cate/ajaxCateDel')}}',{id:id},function (data) {
                                if(data.status == 1){
                                    alert('此分类下,还有商品,不能删除....')
                                }
                    },'json')
                }
            </script>
            <!-- 分页 -->
            <tr>

            </tr>
        </div>
    </div>
</div>
</body>
<script>
    function delManager(id) {
        alert(1);
        return false;
        var bool = confirm("你确定要删除吗？");
        if(bool){
            // 1. 效果
            var aid = "id_"+id;
            $('#'+aid).remove();
            // 2. 数据库
            $.get("{{url('Admin/Manager/managerDel')}}",{id:id},function () {
                if(data.status == 1){
                    location.href = "";
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
