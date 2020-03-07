<?php

// 见名知意
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
class GoodsController extends Controller
{
    //
    public function goodsAdd(){
        // 查询所有分类信息
        $rows  = getAllCateList();
        $data = compact("rows");
        return view("Admin.Goods.goodsAdd",$data);
    }
    public function goodsAddAction(Request $request){
        $filename = uploadPic($request);
        if(!$filename){
            // 如果图片上传失败,跳转
            return redirect(url('Admin/Goods/goodsAdd'));
        }
        // 逻辑 图片上传成功后，写数据库
        // 数据写入成功 // 数据库写入失败，删原图
        //  图片上传失败，不写了，直接跳转
        $cate_id = Input::get('cate_id');
        if($cate_id){
            $data = Input::all();
            unset($data['_token']);
            $data['add_time'] = time();
            $data['goods_pic'] = $filename;
            $id = DB::table('goods')->insertGetId($data);
            if($id){
                // 商品添加成功后,修改商品所属分类的count + 1
                $path = DB::table('category')->where('id',$cate_id)->pluck('path')->first();
                $pathArr = explode(',',$path);
                 DB::table('category')->whereIn('id',$pathArr)->increment('count');
                return redirect("Admin/Goods/goodsList");
            }else{
                //删
                unlink('./upload/'.$filename);
            }
        }else{
            // 不能添加
        }



    }

    public function goodsList(){
        $pageSize = 10;
        $cateList = getAllCateList();
        $search = Input::get('search');
        $keyword = Input::get('keyword')??'';
        $cate_id = Input::get('cate_id');
        if($search && ($keyword || $cate_id)){
            $where = [];
            // 如果search 有值 说明有人点击了查询
            // 1.只有搜索关键字有值
            if($keyword && !$cate_id){
                // 2.只有分类有值
            }else if($cate_id && !$keyword){
                // 根据当前分类的id 获取此分类下的子孙id
                $ids_arr = getSonsIdById($cate_id);
                // 如果没有孩子的话,把自己的id放到数组中
                array_unshift($ids_arr,$cate_id);
            }else{
                // 3.两个都有值
                $ids_arr = getSonsIdById($cate_id);
                array_unshift($ids_arr,$cate_id);
            }
            $rows = DB::table('goods')
                ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                ->leftJoin('category', 'category.id', '=', 'goods.cate_id')
                ->whereIn('cate_id',$ids_arr)  ->where($where)
                ->orderBy('add_time','desc')->paginate($pageSize);
        }else{
            $rows = DB::table('goods')
                ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                ->leftJoin('category', 'category.id', '=', 'goods.cate_id')->where('is_del',0)
                ->orderBy('add_time','desc')->paginate($pageSize);
        }
        $data = compact('rows','keyword','cateList','search','cate_id'); //
//        $data = ['rows'=>$rows];
            return view("Admin.Goods.goodsList",$data);
    }
    public function goodsEdit($id){
        // 获取所有的分类
        $rows = getAllCateList();
        $goods = DB::table('goods')->find($id);
        $data = compact('goods','rows');
        return view('Admin/Goods/goodsEdit',$data);
    }
    public function goodsEditAction(Request $request){
        $id = Input::get('id');
        $all = Input::all();
        unset($all['id']);
        unset($all['_token']);
        if($request->hasFile('goods_pic')){
            // 上传了新的图片
            // 1.上传新图片
            $filename = uploadPic($request);

            if($filename){
                $all['goods_pic'] = $filename;
                // 上传新图成功
               $goods =  DB::table('goods')->find($id);
                // 2.成功后,删除老图片
               $pic = $goods->goods_pic;
               if(!empty($pic)){
                   if(file_exists('./upload/'.$pic)){
                       unlink('./upload/'.$pic);
                   }
               }


               // 商品图片表 删除此商品下的所有幅图
                // 3.删除此商品对应的所有副图
               /* $rows = DB::table('goods_pic')->where('gid',$id)->get();
                foreach ($rows as $v){
                    unlink("./upload/$v->path");
                }
               // 4.删除商品图片表的 所有此商品对应的记录
                DB::table('goods_pic')->where('gid',$id)->delete();
               */
                // 5. 修改数据库
                DB::table('goods')->where('id',$id)->update($all);

            }else{
                return redirect(url('Admin/Goods/goodsEdit',[$id]));
            }
        }else{
            // 3.修改数据库
            // 5. 修改数据库
            DB::table('goods')->where('id',$id)->update($all);

        }

        return redirect(url('Admin/Goods/goodsList'));

    }

    public function ajaxGoodsDel(){
        $id = Input::get('id');

       if(DB::table('goods')->where('id',$id)->delete()){
           $data['status'] =1;
       }else{
           $data['status'] = 2;
       }
       return response()->json($data);
    }



}
