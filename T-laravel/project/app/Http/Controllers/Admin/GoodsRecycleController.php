<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Cookie;
class GoodsRecycleController extends Controller
{
    //
    public function goodsList(){
        $pageSize = 10;
        $cateList = getAllCateList();
        $search = Input::get('search');
        $keyword = Input::get('keyword')??'';
        $cate_id = Input::get('cate_id');
        if($search && ($keyword || $cate_id)){
            // 如果search 有值 说明有人点击了查询
            // 1.只有搜索关键字有值
            if($keyword && !$cate_id){
                $rows = DB::table('goods')
                    ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                    ->leftJoin('category', 'category.id', '=', 'goods.cate_id')
                    ->where('goods_name','like',"%$keyword%")->where('is_del',1)
                    ->orderBy('add_time','desc')->paginate($pageSize);
                // 2.只有分类有值
            }else if($cate_id && !$keyword){
                // 根据当前分类的id 获取此分类下的子孙id
                $ids_arr = getSonsIdById($cate_id);
                // 如果没有孩子的话,把自己的id放到数组中
                array_unshift($ids_arr,$cate_id);

                $rows = DB::table('goods')
                    ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                    ->leftJoin('category', 'category.id', '=', 'goods.cate_id')
                    ->whereIn('cate_id',$ids_arr)->where('is_del',1)
                    ->orderBy('add_time','desc')->paginate($pageSize);

            }else{

                // 3.两个都有值
                $ids_arr = getSonsIdById($cate_id);
                array_unshift($ids_arr,$cate_id);
                $rows = DB::table('goods')
                    ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                    ->leftJoin('category', 'category.id', '=', 'goods.cate_id')
                    ->whereIn('cate_id',$ids_arr)  ->where('goods_name','like',"%$keyword%")->where('is_del',1)
                    ->orderBy('add_time','desc')->paginate($pageSize);
            }
        }else{
            $rows = DB::table('goods')
                ->select("goods.id as gid","goods_name","goods_price","goods_detail","goods_pic","category.cate_name","goods.add_time")
                ->leftJoin('category', 'category.id', '=', 'goods.cate_id')->where('is_del',1)
                ->orderBy('add_time','desc')->paginate($pageSize);
        }
        $data = compact('rows','keyword','cateList','search','cate_id'); //
//        $data = ['rows'=>$rows];
        return view('Admin.GoodsRecycle.goodsList',$data);
    }


    public function setCookie(){
        Cookie::make('test', 'hello, world', 10);
        dump(Cookie::get('test'));

    }
}
