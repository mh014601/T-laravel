<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
class RoleController extends Controller
{
    //
    //角色列表
    public function roleList(){
        $rows = DB::table('role')->paginate(20);
        $data = compact('rows');
        return view("Admin/Role/roleList",$data);
    }

    // 分配权限
    public function assignAuth(){
        // 角色表  角色权限表  权限表
        $id = Input::get('id');
        $role_name = DB::table('role')->select('role_name')->find($id)->role_name;

        $my_rows = DB::table('role as r')->leftJoin('role_auth as ra','r.id','=','ra.role_id' )
            ->leftJoin('auth as a','ra.auth_id','=','a.id')->select('a.id as aid','r.id','r.role_name','a.auth_name','a.route','a.pid','a.level')->where('r.id',$id)->get()->toArray();

       $rows = DB::table('auth as a')->leftJoin('role_auth as ra','a.id','=','ra.role_id' )
            ->leftJoin('role as r','ra.auth_id','=','r.id')->select('a.id as aid','r.id','r.role_name','a.auth_name','a.route','a.pid','a.level')->get()->toArray();
        $rows = preArr($rows,'aid');
        $my_rows = preArr($my_rows,'aid');
     /*   dump($my_rows);
        $temp_arr = [];
        foreach ($my_rows as $k=>$v){
            $temp_arr[] = $k;
        }*/

        foreach ($rows as $k=>$v){
            if(array_key_exists($k,$my_rows)){
                $rows[$k]->issel = 1;
            }else{
                $rows[$k]->issel = 0;
            }
        }
        $rows = gettree($rows,'aid');

        $data = compact('role_name','rows','id');
        return view("Admin/Role/assignAuth",$data);
    }

    // 分配权限的处理程序
    public function assignAuthAction(){
        // 删除此角色之前所有老的权限，添加新的权限
        $role_id = Input::get('role_id');
        if(isset($role_id)){
            DB::table('role_auth')->where('role_id',$role_id)->delete();
            // 插入多条记录
            $auth_ids = Input::get('auth_id');
            // $auth_ids 1 2 3 6 7
            $data = [];
            foreach ($auth_ids as $v){
                $data[] = ['role_id'=>$role_id,'auth_id'=>$v];
            }
          /*  $data  = [

                ['role_id'=>3,'auth_id'=>2],
                ['role_id'=>3,'auth_id'=>3],
                ['role_id'=>3,'auth_id'=>6],
                ['role_id'=>3,'auth_id'=>7],
            ];*/
            DB::table('role_auth')->insert($data);

            return redirect(url('Admin/Role/roleList'));
        }



    }

    // 添加角色页面
    public function roleAdd(){
        $rows = DB::table('auth as a')->leftJoin('role_auth as ra','a.id','=','ra.role_id' )
            ->leftJoin('role as r','ra.auth_id','=','r.id')->select('a.id as aid','r.id','r.role_name','a.auth_name','a.route','a.pid','a.level')->get()->toArray();
        $rows = preArr($rows,'aid');

        $rows = gettree($rows,'aid');
        $data = compact('rows');
        return view('Admin/Role/roleAdd',$data);
    }
    // 添加角色处理程序
    public function roleAddAction(){



        $role_name = Input::get('role_name');
        $row = DB::table('role')->where(['role_name'=>$role_name])->first();
        if(!$row){
            $id = DB::table('role')->insertGetId(['role_name'=>$role_name]);
            if($id){
                $auth_ids = Input::get('auth_id');
                // $auth_ids 1 2 3 6 7
                $data = [];
                foreach ($auth_ids as $v){
                    $data[] = ['role_id'=>$id,'auth_id'=>$v];
                }
                DB::table('role_auth')->insert($data);

                return redirect(url('Admin/Role/roleList'));
            }
        }
        return redirect(url('Admin/Role/roleAdd'));


    }
}
