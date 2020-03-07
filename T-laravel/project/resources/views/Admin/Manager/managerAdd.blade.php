<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="{{asset('Admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('Admin/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/kindeditor/kindeditor-all.js')}}"></script>
    <link rel="stylesheet" href="{{asset('Common/layui/css/layui.css')}}">
    <script src="{{asset('Common/layui/layui.js')}}"></script>
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
            <form action="{{url('Admin/Manager/managerAddAction')}}" method="post" id="form1" onsubmit="fun()" class="layui-form">
            <ul class="forminfo">
                {{csrf_field()}}
                <li>
                    <label>管理员名称<b>*</b></label>
                    <input name="admin_name" type="text" class="dfinput" placeholder="请填写管理员名称"  style="width:518px;"/>
                </li>
                <li>
                    <label>管理员密码<b>*</b></label>
                    <input name="admin_pass" type="text" class="dfinput" placeholder="请填写管理员密码"  style="width:518px;"/>
                </li>
                <li>
                    <label>确认密码<b>*</b></label>
                    <input name="admin_pass2" type="text" class="dfinput" placeholder="请填写管理员确认密码"  style="width:518px;"/>
                </li>
                <li>
                    <div class="layui-form-item">
                        <label class="layui-form-label">开关</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="switch" lay-skin="switch">
                        </div>
                    </div>
                  {{--  <label>状态<b>*</b></label>
                    <label for="access">启用：<input checked="checked" type="radio" id="access" name="status" value="1"></label>
                    <label for="deny">禁用：<input type="radio" id="deny" name="status" value="2"></label>--}}
                </li>
                <li>
                    <label>所属角色<b>*</b></label>
                    <div class="vocation">
                        <select  name="role_id">
                            <option value="0">请选择角色</option>
                            @foreach($roles as $v)
                                <option value="{{$v->id}}"> {{$v->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input name="" type="submit" class="btn" value="添加"/>
                </li>
            </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
<script type="text/javascript">

    // function fun(){
    //
    //     return false;
    // }


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

        //加载富文本编辑器
        KindEditor.ready(function(K) {
            K.create('#content', {
                allowFileManager : true,
                filterMode:true,
                afterBlur:function(){
                    this.sync("#content");
                }
            });
        });
    });
</script>
</html>
