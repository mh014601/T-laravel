<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Validation\Rules\In;
use Input;
use Session;
class ManagerController extends Controller
{
    //
    // 管理员列表
    public function managerList(){
        // 获取搜索的关键字
        $keyword = Input::get('keyword');
        $row = DB::table('manager')->where('flag',Session::get('flag'))->first();
        // 首次进来 ，没有传值点击查询
        if(!$keyword){
            // 获取所有的管理员 管理员.id = 管理员_角色表.manager_id   管理员_角色表.role_id =  角色表.id
            $rows = DB::table('manager as m')->leftJoin('manager_role as mr','m.id','=','mr.manager_id')->leftJoin('role as r','mr.role_id','=','r.id')->select('m.id','m.admin_name','m.add_time','m.status','r.role_name')->orderBy('add_time','desc')->paginate(2);


        }else{
            // 输入了关键字进行查询
            $rows = DB::table('manager')->where('admin_name','like',"%$keyword%")->orderBy('add_time','desc')->paginate(1);
        }
        $data = compact('rows','keyword','row');

        return view("Admin/Manager/managerList",$data);
    }

    // 添加管理员
    public function managerAdd(){
        // $roles 角色列表数据
        $roles = DB::table('role')->get();
        $data = compact('roles');
        return view("Admin/Manager/managerAdd",$data);
    }

    // 添加管理员的处理程序
    public function managerAddAction(){

        if(Input::get('swich')){
            $status = 1;
        }else{
            $status = 2;
        }

        $admin_name = Input::get('admin_name');
        $role_id = Input::get('role_id');
        $admin_pass = md5(md5(Input::get('admin_pass')));
        $flag = md5($admin_name.Input::get('admin_pass'));
        $add_time = time();
        // 插入数据库 之前一定要查询数据库管理员名称是否存在

        $row = DB::table('manager')->where(['admin_name'=>$admin_name])->first();
        if(!$row){
            // 插入。 。。
            $data = compact('admin_name','admin_pass','status','flag','add_time');
            $id = DB::table('manager')->insertGetId($data);
            if($id){
                // 跳转到管理员列表页面
                // 管理员添加成功后,向管理员角色表添加一条记录,为当前的管理员分配角色
                DB::table('manager_role')->insertGetId(['manager_id'=>$id,'role_id'=>$role_id]);
                return redirect(url('Admin/Manager/managerList'));
            }else{
                return redirect(url('Admin/Manager/managerAdd'));
            }
        }else{
            // 查到了 不能添加

            return redirect(url('Admin/Manager/managerAdd'));
        }
    }

    // 管理员删除
    public function managerDel(){
        $id = Input::get('id');
        if(isset($id) && $id >0){
            // 删除
            DB::table('manager')->where(['id'=>$id])->delete();
//            return redirect(url('Admin/Manager/managerList'));
            $data['status'] =1;
        }
        return response()->json($data);


    }

    // 管理员编辑页面
    public function managerEdit(){
        $id = Input::get('id');
        $row = DB::table('manager')->where('id',$id)->first();
        return view("Admin.Manager.managerEdit",['row'=>$row]);
    }

    public function managerEditAction(){
        $id = Input::get('id');
        $admin_name = Input::get('admin_name');
        $status = Input::get('status');

        // 查询管理员是否已经存在
        // 排除掉自己查询别人
        $row = DB::table('manager')->where('admin_name',$admin_name)->where('id','!=',$id)->first();
        if($row){
            return redirect("Admin/Manager/managerEdit?id=$id");
        }else{
            $data['admin_name'] = $admin_name;
            $data['status'] = $status;
            DB::table('manager')->where('id',$id)->update($data);
            return redirect("Admin/Manager/managerList");
        }
    }
}
