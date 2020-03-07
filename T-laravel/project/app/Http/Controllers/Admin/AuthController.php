<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class AuthController extends Controller
{
    //权限列表 啊啊啊
    public function authList(){
        $rows = gettree(preArr(DB::table('auth')->get()));
        $data = compact('rows');

        return view("Admin/Auth/authList",$data);
    }

    // 添加权限
    public function authAdd(){
        // 读取所有一级权限
        $authList = DB::table('auth')->where('pid',0)->get();
        $data = compact('authList');
        return view("Admin/Auth/authAdd",$data);
    }
    // 添加权限处理程序
    public function authAddAction(){
        $pid = Input::get('pid');
        $auth_name = Input::get('auth_name');
        // 查询此权限是否已经存在
        $row = DB::table('auth')->where(['auth_name'=>$auth_name])->first();
        if(!$row){
            if($pid){
                // 添加的不是根权限
                $data['level'] = 2;
                $data['route'] = Input::get('route');
            }else{
                $data['level'] = 1;
            }
            $data['auth_name'] = $auth_name;
            $data['pid'] = $pid;
           $id =  DB::table('auth')->insertGetId($data);
           if($id){
               return redirect(url("Admin/Auth/authList"));
           }
        }

        return redirect(url('Admin/Auth/authAdd'));

    }
}
