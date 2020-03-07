您正在为 "{{$role_name}}" 分配权限....
<script type="text/javascript" src="{{asset('Admin/js/jquery.min.js')}}"></script>
<style>
    li{
        list-style-type: none;
    }
</style>
<form action="{{url('Admin/Role/assignAuthAction')}}" method="post">
    {{csrf_field()}}
    @foreach($rows as $v)
        <ul>
            <li style="font-weight: bold"><input type="checkbox" name="auth_id[]" value="{{$v->aid}}" class="chk" myid="{{$v->aid}}" pid="{{$v->pid}}" checkSel="sel_{{$v->pid}}" ch="ch_{{$v->aid}}"
                                                 @if($v->issel == 1)
                                                 checked
                        @endif
                >{{$v->auth_name}}</li>
            <li>

                <ul>
                    @foreach($v->son as $v1)
                        <li><input type="checkbox" name="auth_id[]" value="{{$v1->aid}}" class="chk" myid="{{$v1->aid}}" pid="{{$v1->pid}}"  checkSel="sel_{{$v1->pid}}"
                                   @if($v1->issel == 1)
                                   checked
                                    @endif
                            >{{$v1->auth_name}}</li>
                    @endforeach
                </ul>

            <li>
        </ul>
    @endforeach
    <input type="hidden" value="{{$id}}" name="role_id">
    <input type="submit" value="提交">
</form>
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
