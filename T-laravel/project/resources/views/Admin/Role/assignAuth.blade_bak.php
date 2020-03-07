您正在为 "{{$role_name}}" 分配权限....
<style>
    li{
        list-style-type: none;
    }
</style>

@foreach($rows as $k=>$v)
<ul>
    <li style="font-weight: bold"><input type="checkbox"
        @if(in_array($v->aid,$temp_arr))
            checked
                                         @endif
        >{{$v->auth_name}}</li>
    <li>

        <ul>
            @foreach($v->son as $k1=>$v1)
                <li><input type="checkbox"
                           @if(in_array($v1->aid,$temp_arr))
                           checked
                    @endif
                    >{{$v1->auth_name}}</li>
            @endforeach
        </ul>

    <li>
</ul>
@endforeach

<input type="submit" value="提交">