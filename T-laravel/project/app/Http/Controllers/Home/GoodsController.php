<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use DB;
use Session;
class GoodsController extends Controller
{
    //
    public function detail(Request $request){
        $id = Input::get('id');
        DB::table('goods')->where('id',$id)->increment('hit');

        $current_url = urlencode($request->getUri());
         $goods = DB::table('goods as g')->leftJoin('category as c','g.cate_id','c.id')->
         select('g.id','g.goods_name','g.goods_price','g.goods_pic','g.goods_detail','c.cate_name','g.hit')->where('g.id',$id)->first();
         if(!$goods){
             // 跳转404
             return redirect(url('/'));
         }
        // 查询点击量

         $data = compact('goods','current_url');
        return view("Home.Goods.detail",$data);

    }


    public function isLogin(){
        // 判断用户是否登录
        // 从session 取用户信息
        if(Session::get('uid')){
            // 已经登录
            return Session::get('uid');
        }else{
            return false;
        }
    }
    // 添加购物车 第一种情况
    /*public function ajaxAddCart(){
    // 判断用户是否登录
        if($this->isLogin()){
            $uid = $this->isLogin() ;
            $gid = Input::get('id');
            $num = Input::get('num');
        // 存购物车 之前需要查询 此商品是否已经存在
            $row = DB::table('cart')->where(['uid'=>$uid,'gid'=>$gid])->first();
            if($row){
                // 取出这个商品的数量
               //$new_num = $row->num + $num;
               // DB::table('cart')->where(['id'=>$row->id])->update(['num'=>$new_num]);
                $bool = DB::table('cart')->where(['id'=>$row->id])->increment('num',$num);
            }else{
                $data = compact('uid','gid','num');
            $bool = DB::table('cart')->insertGetId($data);
            }
            if($bool){
                $da['status'] = 0;
            }else{
        $da['status'] = 1;
            }
        }else{
            $da['status'] = 2;
        }
        return response()->json($da);
        }*/


    public function ajaxAddCart(){
        // 判断用户是否登录
        if($this->isLogin()){
            //
        }else{
           $id = Input::get('id'); // 商品id
           $row =  DB::table('goods')->find($id);

           $num = Input::get('num'); // 商品数量
            // 判断我要添加的商品是否已经存在session
            $goodsList = Session::get('goodsList',[]);
                if(array_key_exists($id,$goodsList)) {
                    // 修改数量即可
                    $goodsList[$id]['num'] += $goodsList[$id]['num'];
                }else{
                    //   // 此商品从未被添加到session
                    $goodsList[$id]['num'] = $num;
                }
            $goodsList[$id]['gid'] = $id;
            $goodsList[$id]['goods_name'] = $row->goods_name;
            $goodsList[$id]['goods_price'] = $row->goods_price;
            $goodsList[$id]['goods_pic'] = $row->goods_pic;
            Session::put('goodsList', $goodsList);
            $data['status'] = 1;

        }
        return response()->json($data);

    }

    public function getSession(){
        $goodsList = Session::get('goodsList');

        dump($goodsList);
    }

    // 购物车
    public function cart(){
        if($this->isLogin()){
            $uid = Session::get('uid');

            $cartList = DB::table('cart as c')->select('c.*','g.goods_name','g.goods_price','g.goods_pic')->leftJoin('goods as g','c.gid','=','g.id')->where('uid',$uid)->get();
            $cartCount = DB::table('cart as c')->where('uid',$uid)->count();

            $total = 0;
            foreach ($cartList as $v){
                $total += $v->goods_price * $v->num;
            }

            $data = compact('cartList','cartCount','total');
        }else{
            $cartList = Session::get('goodsList');

            $cartCount = count($cartList);

            // 总价
            $total = 0;
            foreach ($cartList as $v){
              $total += $v['num'] * $v['goods_price'];
            }
            $cartList = json_decode(json_encode($cartList));
            $data = compact('cartList','cartCount','total');
        }

        return view('Home/Goods/cart',$data);
    }

    public function ajaxChangeCartNum(){
        $id = Input::get('id');
        $num = Input::get('num');

        // 修改数据库
        DB::table('cart')->where('id',$id)->update(['num'=>$num]);
    }
    public function ajaxDelCart(){
        $uid = Session::get('uid');
        $id = Input::get('id');
        if(isset($id)){
            // 修改数据库
            $bool = DB::table('cart')->where('id',$id)->delete();
            if($bool){
                $data['count'] = DB::table('cart')->where('uid',$uid)->count();
            }

        }

        return response()->json($data);

    }

    public function ajaxDelSelect(){
//        $uid = Session::get('uid');
          $ids = Input::get('ids');
            // 修改数据库
            $bool = DB::table('cart')->whereIn('id',$ids)->delete();


    }

    // 提交订单
    public function submitOrder(){
        $ids = Input::get('cid');
        $uid = Session::get('uid');
        $rows = DB::table('cart')->whereIn('id',$ids)->get();
        dump($rows);
        $data['order_sn'] = time().$uid;
        foreach ($rows as $v){
            $data['gid'] = $v->gid;
            $data['num'] = $v->num;
            $id = DB::table('my_order')->insertGetId($data);
            if($id && $v->id>0){
                DB::table('cart')->where('id',$v->id)->delete();
            }
        }
    }

    // ajax 提交订单
    public function ajaxSubmitOrder(){
        $ids = Input::get('cid');
        dump($ids);
    }
}
