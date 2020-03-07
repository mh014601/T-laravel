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
            <form action="{{url('Admin/Auth/authAddAction')}}" method="post" id="form1" class="layui-form">
                <ul class="forminfo">
                    {{csrf_field()}}
                    <li>
                        <label>所属权限<b>*</b></label>
                        <div class="vocation">
                            <select name="pid" id="sel" lay-filter="test">
                                <option value="0">根分类</option>
                                @foreach($authList as $a)
                                <option value="{{$a->id}}">{{$a->auth_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>添加权限<b>*</b></label>
                        <input name="auth_name" type="text" class="dfinput" placeholder="请填写分类名称"  style="width:518px;"/>
                    </li>
                    <li id="route">
                        <label>添加路由<b>*</b></label>
                        <input name="route" type="text" class="dfinput" placeholder="请填写路由名称"  style="width:518px;"/>
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
    $('#route').hide();

</script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
        // 监听选择
        form.on('select(test)', function(data){
            var id = parseInt(data.value);
            if(id>0){
                $('#route').show();
            }else{
                $('#route').hide();
            }

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
