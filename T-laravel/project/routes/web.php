<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// zxh 前台首页
Route::get('/', ['uses'=>'Home\IndexController@index']);
Route::get('/cookieset', function()
{
    $foreverCookie = Cookie::forever('forever', 'Success');
    $tempCookie = Cookie::make('temporary', 'Victory', 5);//参数格式：$name, $value, $minutes
    return Response::make()->withCookie($foreverCookie)->withCookie($tempCookie);
});

Route::get('/cookietest', function()
{
    $forever = Cookie::get('forever');
    $temporary = Cookie::get('temporary');
    return View::make('cookietest', array('forever' => $forever, 'temporary' => $temporary, 'variableTest' => 'works'));
});
// 发邮件的路由
Route::group(['prefix'=>'Mail/'],function (){
    Route::get('/sendText', ['uses'=>'MailController@sendText']);
    Route::get('/send', ['uses'=>'MailController@send']);
});


Route::get('/Index/callback',['uses'=>'Home\IndexController@callback']);
Route::get('/Index/getAccessTokenByCode',['uses'=>'Home\IndexController@getAccessTokenByCode']);
Route::get('/Index/getOpenIdByAccessToken',['uses'=>'Home\IndexController@getOpenIdByAccessToken']);
// 前台
Route::group(['prefix'=>'Home'],function (){
    // 商品模块
    Route::group(['prefix'=>'/Index'],function (){
        // zxh 商品首页

        Route::get('/register',['uses'=>'Home\IndexController@register']);
        Route::get('/login',['uses'=>'Home\IndexController@login']);
        Route::post('/loginAction',['uses'=>'Home\IndexController@loginAction']);
        Route::get('/loginOut',['uses'=>'Home\IndexController@loginOut']);
        //
        Route::post('/registerAction',['uses'=>'Home\IndexController@registerAction']);
        //
        Route::post('/ajax_checkUname',['uses'=>'Home\IndexController@ajax_checkUname']);
        Route::get('/activeMember',['uses'=>'Home\IndexController@activeMember']);
        Route::get('/juhecurl',['uses'=>'Home\IndexController@juhecurl']);
        Route::get('/sendSms',['uses'=>'Home\IndexController@sendSms']);

    });
    Route::group(['prefix'=>'/Goods'],function (){
        // zxh 商品首页
        Route::get('/detail',['uses'=>'Home\GoodsController@detail']);
        Route::any('/isLogin',['uses'=>'Home\GoodsController@isLogin']);
        Route::any('/ajaxAddCart',['uses'=>'Home\GoodsController@ajaxAddCart']);
        Route::any('/cart',['uses'=>'Home\GoodsController@cart']);
        Route::get('/ajaxChangeCartNum',['uses'=>'Home\GoodsController@ajaxChangeCartNum']);
        Route::get('/ajaxDelCart',['uses'=>'Home\GoodsController@ajaxDelCart']);
        Route::get('/ajaxDelSelect',['uses'=>'Home\GoodsController@ajaxDelSelect']);
        Route::get('/getSession',['uses'=>'Home\GoodsController@getSession']);
        Route::post('/submitOrder',['uses'=>'Home\GoodsController@submitOrder']);
        Route::post('/ajaxSubmitOrder',['uses'=>'Home\GoodsController@ajaxSubmitOrder']);


    });
    Route::group(['prefix'=>'/Cate'],function (){
        // zxh 商品首页
        Route::get('/cateList/{id}',['uses'=>'Home\CateController@cateList']);
        Route::post('/ajaxPageData',['uses'=>'Home\CateController@ajaxPageData']);

    });
});

// 后台
Route::group(['prefix'=>'Admin','middleware'=>'adminLogin'],function (){
    // 后台模块
    Route::group(['prefix'=>'/Index'],function (){
        // 后台首页
        Route::get('/index',['uses'=>'Admin\IndexController@index']);
        Route::get('/top',['uses'=>'Admin\IndexController@top']);
        Route::get('/left',['uses'=>'Admin\IndexController@left']);
        Route::get('/main',['uses'=>'Admin\IndexController@main']);
        Route::get('/login',['uses'=>'Admin\IndexController@login']);
        // zxh 登录的处理程序
        Route::post('/loginAction',['uses'=>'Admin\IndexController@loginAction']);
        Route::get('/loginOut',['uses'=>'Admin\IndexController@loginOut']);
    });
    // 管理员模块
    Route::group(['prefix'=>'/Manager'],function (){
        // 管理员首页
        Route::any('/managerList',['uses'=>'Admin\ManagerController@managerList']);
        Route::get('/managerAdd',['uses'=>'Admin\ManagerController@managerAdd']);
        Route::post('/managerAddAction',['uses'=>'Admin\ManagerController@managerAddAction']);
        Route::get('/managerDel',['uses'=>'Admin\ManagerController@managerDel']);

        // 编辑页面
        Route::get('/managerEdit',['uses'=>'Admin\ManagerController@managerEdit']);
        Route::post('/managerEditAction',['uses'=>'Admin\ManagerController@managerEditAction']);

    });
    // 角色模块
    Route::group(['prefix'=>'/Role'],function (){
        // 角色列表
        Route::any('/roleList',['uses'=>'Admin\RoleController@roleList']);
        // 分配权限
        Route::any('/assignAuth',['uses'=>'Admin\RoleController@assignAuth']);
        Route::any('/assignAuthAction',['uses'=>'Admin\RoleController@assignAuthAction']);

        // 添加角色
        Route::any('/roleAdd',['uses'=>'Admin\RoleController@roleAdd']);
        Route::any('/roleAddAction',['uses'=>'Admin\RoleController@roleAddAction']);

    });
    // 权限模块
    Route::group(['prefix'=>'/Auth'],function (){
        // 权限列表
        Route::any('/authList',['uses'=>'Admin\AuthController@authList']);

//        // 添加权限
        Route::any('/authAdd',['uses'=>'Admin\AuthController@authAdd']);
        Route::any('/authAddAction',['uses'=>'Admin\AuthController@authAddAction']);

    });
    // 商品分类模块
    Route::group(['prefix'=>'/Cate'],function (){
        // 管理员首页
        Route::any('/cateList',['uses'=>'Admin\CateController@cateList']);
        Route::any('/cateAdd',['uses'=>'Admin\CateController@cateAdd']);
        Route::any('/cateAddAction',['uses'=>'Admin\CateController@cateAddAction']);
        Route::any('/ajaxCateDel',['uses'=>'Admin\CateController@ajaxCateDel']);


    });
    // 商品模块
    Route::group(['prefix'=>'/Goods'],function (){
        //
        Route::any('/goodsList',['uses'=>'Admin\GoodsController@goodsList']);
        Route::get('/goodsAdd',['uses'=>'Admin\GoodsController@goodsAdd']);
        Route::get('/goodsEdit/{id}',['uses'=>'Admin\GoodsController@goodsEdit']);
        Route::post('/goodsEditAction',['uses'=>'Admin\GoodsController@goodsEditAction']);
        Route::post('/goodsAddAction',['uses'=>'Admin\GoodsController@goodsAddAction']);
        Route::post('/ajaxGoodsDel',['uses'=>'Admin\GoodsController@ajaxGoodsDel']);
    });


    // 商品回收站
    Route::group(['prefix'=>'/GoodsRecycle'],function (){
        //
        Route::any('/goodsList',['uses'=>'Admin\GoodsRecycleController@goodsList']);
        Route::any('/setCookie',['uses'=>'Admin\GoodsRecycleController@setCookie']);


    });

});
