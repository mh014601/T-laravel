<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{asset('Admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('Admin/js/jquery.min.js')}}"></script>
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
        <div id="tab1" class="tabson">
            <form action="{{url('Admin/Role/roleAddAction')}}" method="post" id="form1" class="layui-form" onsubmit="return fun()">
            <ul class="forminfo">
                {{csrf_field()}}
                <li>
                    <label>角色名称<b>*</b></label>
                    <input name="role_name" type="text" class="dfinput" placeholder="请填写角色名称"  style="width:518px;"/>
                </li>

                <li>
                    <label>&nbsp;</label>
                    <input name="" type="submit" class="btn" value="添加"/>
                </li>
                <li>
            </ul>
                @foreach($rows as $v)
                    <dl>
                        <li style="font-weight: bold"><input type="checkbox" name="auth_id[]" value="{{$v->aid}}" class="chk" myid="{{$v->aid}}" pid="{{$v->pid}}" checkSel="sel_{{$v->pid}}" ch="ch_{{$v->aid}}"

                            >{{$v->auth_name}}</li>
                        <li>

                            <ul>
                                @foreach($v->son as $v1)
                                    <li><input type="checkbox" name="auth_id[]" value="{{$v1->aid}}" class="chk" myid="{{$v1->aid}}" pid="{{$v1->pid}}"  checkSel="sel_{{$v1->pid}}"

                                        >{{$v1->auth_name}}</li>
                                @endforeach
                            </ul>

                        <li>
                    </dl>
                    @endforeach
                </li>

            </form>
        </div>
    </div>
</div>
</body>
<script>
    $('.chk').click(function(){
        var sel = $(this).is(":checked")
        var myid = $(this).attr('myid');
        var pid = $(this).attr('pid');
        if(sel){
            // 它被选中了。。。 获取当前的权限的id,让孩子们全部被选中
            $("input[checkSel='sel_"+myid+"']").prop('checked','checked');
            // 它被选中了。。。。让他的父亲被选中
            $("input[ch='ch_"+pid+"']").prop('checked','checked');
        }else{
            // 如果自己都不选了，让孩子们全部取消
            $("input[checkSel='sel_"+myid+"']").removeAttr('checked');

            // 只要取消掉 就会取消掉 父亲的属性
            // 点击了谁，通过自己，找到自己的兄弟，看看自己的兄弟有没有被选中的
            var flag = true;
            $("input[checksel='sel_"+pid+"']").each(function(){
                if($(this).is(":checked")){
                    flag = false;// 3  2  1 0
                }
            });
            if(flag){
                $("input[ch='ch_"+pid+"']").removeAttr('checked');
            }

        }
    })
</script>

</html>
