<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // 判断一下当前的路由
        $deny_list = ['Admin/Index/login','Admin/Index/loginAction','Admin/Index/loginOut'];
        // 如果你访问的路由不在禁止访问的路由数组中,才去验证session
        if( !in_array($request->route()->uri,$deny_list)){
            if(!Session::get('flag')){
                return redirect(url('Admin/Index/login'));
            }else{
                $flag = Session::get('flag');
                // 2.根据用户id 查询 角色 ,权限
                $id = DB::table('manager')->select('id')->where('flag',$flag)->first()->id;
                if($id>1){
                    // 如果不是超级管理员,才验证权限
                    checkRoute($request,$id);
                }

            }
        }
        return $next($request);
    }
}
