<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
class CateController extends Controller
{
    //
    public function  cateList(){

        $rows = DB::table('category')->orderBy('path','asc')->get();
        $data = compact("rows");
        return view("Admin.Cate.cateList",$data);
    }

    // 添加分类
    public function cateAdd(){
        // 获取所有的分类
        $rows = DB::table("category")->orderBy('path','asc')->get();
        $data  = compact('rows');
        return view("Admin.Cate.cateAdd",$data);
    }

    // 添加分类的处理程序
    public function cateAddAction(){
        $id = Input::get('id');
        $cate_name = Input::get('cate_name');
        // 无论根分类还是子分类，但凡查询的分类已经存在，就别想插入了。。。
        $row = DB::table("category")->where('cate_name',$cate_name)->first();

        if($row){
            // 此分类已经存在
            return redirect(url('Admin/Cate/cateAdd'));
        }else{
            // 不是根分类
            if($id>0){
                $pid = $id;
                // 1.通过父id查询到父类的path
                $row = DB::table('category')->where('id',$id)->select('path')->first();

//                $row = DB::table('category')->where('id',$id)->first();
                $path = $row->path;
                $data = compact('cate_name','pid');
                // 2.插入成功后获取当前的id
                $id = DB::table("category")->insertGetId($data);
                // 3.当前的path = 父类的path + “,自己的id“
                $path = $path.",$id";
            }else{
                // 插入根分类
                $pid = 0;
                $data = compact('cate_name','pid');
                $id = $path = DB::table("category")->insertGetId($data);
            }
            // 4.修改当前分类的path
            DB::table('category')->where('id',$id)->update(['path'=>$path]);
            return redirect(url('Admin/Cate/cateList'));
        }


    }

    public  function ajaxCateDel(){
        $id = Input::get('id');
        // 根据当前的分类id查询它是否是最低级
        $ids = getSonsIdById($id);
        if(!$ids){
            //
            $row = DB::table('goods')->where('cate_id',$id)->get();
            if($row){
                // 如果查的到,就说明此分类下还有商品,不能删除此分类
                $data['status'] = 1;
            }else{
                # 如果去商品表 查不到,此分类下没有商品,直接删除此分类
                // 删除操作
                $data['status'] = 2;
            }
        }else{
            $data['status'] = 3;
        }

        return response()->json($data);
    }


}
