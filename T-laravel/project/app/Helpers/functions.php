<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/21
 * Time: 11:06
 */
// 无限级分类
function gettree($arr,$id='id')
{
    $tree = array();
    foreach ($arr as $val) {
        if (isset($arr[$val->pid])){
            $arr[$val->pid]->son[] = &$arr[$val->$id]; //非顶级分类
        } else {
            $tree[] = &$arr[$val->$id];
        }
    }
    return $tree;
}
// 处理数组 让数组的键就是数组id
function preArr($arr,$id='id'){
    $temp = [];
    foreach ($arr as $k=>$v){
        $temp[$v->$id] = $v;// $temp_arr[1] = ['id'=>1,'cate_name'=>'服装','pid'=>0,'path'=>'1']
    }
    return $temp;
}
// 获取所有的商品分类
function getAllCateList(){
    return   DB::table('category')->orderBy('path','asc')->get();
}
// 上传图片
function uploadPic($request){
    $old_name =  $request-> file('goods_pic')->getClientOriginalName();
    $ext =  $request-> file('goods_pic')->getClientOriginalExtension();
    $filename = $old_name.time().mt_rand(1000,9999).'.'.$ext;
    $bool =  $request->file('goods_pic')->move("./upload/",$filename);
    if($bool){
        return $filename;
    }else{
        return false;
    }
}
function getSonsIdById($id)
{
    static $arr = [];
    // 1.获取孩子的id
    $rows = DB::table('category')->where('pid',$id)->get();
    if ($rows) {
        // 说明还有孩子 继续查询
        foreach ($rows as $v) {
            $id = $v->id;  // 4   5  6
            $arr[] = $id;
            getSonsIdById($id);// 4
        }
    }
    return $arr;
}
// 1. app 目录下 新建 目录Helpers(自定义目录,目录名任意)
// 2. Helpers 目录下 新建php文件 functions.php(自定义文件,文件名任意)
// 3. composer.json 文件 添加 "files":["app/Helpers/functions.php" ]
//"autoload": {
//    "classmap": [
//        "database/seeds",
//        "database/factories"
//    ],
//        "psr-4": {
//        "App\\": "app/"
//        },
//        "files":[
//        "app/Helpers/functions.php"
//    ]
//    },
//
//// 4. 执行命令 composer dump-auto 重新加载 composer.json 配置文件 生效
///
// 根据用户id 返回能够访问的权限数组
function getAllowRouteList($id){
    $rows = DB::table("manager as m")
        ->join('manager_role as mr','m.id','=','mr.manager_id')
        ->join('role as r','r.id','=','mr.role_id')
        ->join('role_auth as ra','ra.role_id','=','r.id')
        ->join('auth as a','ra.auth_id','=','a.id')
        ->select('m.id','admin_name','r.role_name','auth_name','route','pid','a.id as aid')
        ->where('m.id',$id)->get();
    return $rows;
}

// 验证 权限 访问
function checkRoute($request,$id){
    $rows = getAllowRouteList($id);
    $deny_list_route = ['Admin/Index/index','Admin/Index/top','Admin/Index/left','Admin/Index/main','Admin/GoodsRecycle/setCookie'];
    foreach ($rows as $v){
        $deny_list_route[] = $v->route;
    }
    if(!in_array($request->route()->uri,$deny_list_route)){
        return abort(404);
    }
}


// 高亮显示搜索结果
function showBeauti($keyword,$content){
    $rep = "<span style='color:red;display:inline'>$keyword</span>";
    return str_replace($keyword,$rep,$content);
}