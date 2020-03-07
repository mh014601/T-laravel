<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
class CateController extends Controller
{
    //
    public function cateList1($id){
      /*  $k = Input::get('k','0_0');
        $arr = explode('_',$k);
        $addr = $arr[0];
        $price = $arr[1];*/

        $price = Input::get('price',0);
        $addr = Input::get('addr',0);
        $where = [];
        // 产地
        switch ($addr){
            case "1":
                $where[] = ['addr',1];

                break;
            case "2":
                $where[] = ['addr',2];

                break;
            case "3":
                $where[] = ['addr',3];

                break;
        }

        // 价格
        switch ($price){
            case "1":
                $where[] = ['goods_price','>',0];
                $where[] = ['goods_price','<=',100];
                break;
            case "2":
                $where[] = ['goods_price','>',100];
                $where[] = ['goods_price','<=',200];
                break;
            case "3":
                $where[] = ['goods_price','>',200];
                $where[] = ['goods_price','<=',300];
                break;
            case "4":
                $where[] = ['goods_price','>',300];
                $where[] = ['goods_price','<=',400];
                break;
            case "5":
                $where[] = ['goods_price','>',400];
                $where[] = ['goods_price','<=',500];
                break;
            case "6":
                $where[] = ['goods_price','>',500];
                break;

        }
        // 根据此分类id 获取所有子孙id
        $ids = getSonsIdById($id);
        array_unshift($ids,$id);

        // 查询此分类列表ids数组下的所有商品
        $goods_list = DB::table('goods')->whereIn('cate_id',$ids)->where($where)->get();

        $data = compact('goods_list','id','price','addr');
        return view("Home/Cate/cateList",$data);
    }

    public function cateList($id){
        $k = Input::get('k','0_0');
        $arr = explode('_',$k);
        $addr = $arr[0];
        $price = $arr[1];
        $where = [];
        // 产地
        switch ($addr){
            case "1":
                $where[] = ['addr',1];
                break;
            case "2":
                $where[] = ['addr',2];
                break;
            case "3":
                $where[] = ['addr',3];
                break;
        }
        // 价格
        switch ($price){
            case "1":
                $where[] = ['goods_price','>',0];
                $where[] = ['goods_price','<=',100];
                break;
            case "2":
                $where[] = ['goods_price','>',100];
                $where[] = ['goods_price','<=',200];
                break;
            case "3":
                $where[] = ['goods_price','>',200];
                $where[] = ['goods_price','<=',300];
                break;
            case "4":
                $where[] = ['goods_price','>',300];
                $where[] = ['goods_price','<=',400];
                break;
            case "5":
                $where[] = ['goods_price','>',400];
                $where[] = ['goods_price','<=',500];
                break;
            case "6":
                $where[] = ['goods_price','>',500];
                break;
        }
        // 根据此分类id 获取所有子孙id
        $ids = getSonsIdById($id);
        array_unshift($ids,$id);
        // 查询此分类列表ids数组下的所有商品
        $goods_list = DB::table('goods')->whereIn('cate_id',$ids)->where($where)->limit(2)->get();

        $pageSize = 2;
        $count = DB::table('goods')->whereIn('cate_id',$ids)->count();
        $totalPage = ceil($count/$pageSize);
        $data = compact('goods_list','id','price','addr','totalPage');
        return view("Home/Cate/cateList",$data);
}
    // ajax 分页
    public function ajaxPageData(){
        $pageSize = 2;

        $id = Input::get('id');
        $page = Input::get('page');
        $num = ($page-1)*2;
        // 查询第二页的数据
        // 根据此分类id 获取所有子孙id
        $ids = getSonsIdById($id);
        array_unshift($ids,$id);

        // 查询此分类列表ids数组下的所有商品 0 2 4 6 8 (页码-1)*2
        $goods_list = DB::table('goods')->whereIn('cate_id',$ids)->offset($num)->limit($pageSize)->get();

        return response()->json($goods_list);


    }
}
