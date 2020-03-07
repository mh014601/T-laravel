<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Session;
class IndexController extends Controller
{
    const APP_ID = '101511175';
    const APP_KEY = 'ae61e6840ff3c11e2b06b7d2d9109c21';
    // 首页 zxh
    public function index(){
        // 1.获取分类表所有数据
        $cateList = DB::table('category')->where('count','>',0)->get();
        // 格式化处理数组 让键就是数组的id
        $cateList = preArr($cateList);

        $rows = gettree($cateList);
        $data = compact('rows');
        return view("Home.Index.index",$data);
    }

    // 注册 zxh
    public function register(){

        return view("Home.Index.register");
    }
    // 注册处理
    public function registerAction()
    {
        $uname = Input::get('uname');
        $upass = md5(Input::get('upass'));
        $phone = Input::get('phone');
        $email = Input::get('email');
        $code = md5($uname.$upass);
//        $timeout = time()+30*60;
        $data = compact('uname', 'upass', 'phone','code');

        $reg_uname = '/^[a-z][a-zA-Z0-9]$/';
//        if(!preg_match($reg_uname,$uname)){
//
//        }
        // 查询
        $res = DB::table('member')->where(['uname' => $uname])->first();
        if (!$res) {
            // 可以注册
            $id = DB::table('member')->insertGetId($data);
            if ($id) {
                // 注册成功
                // 跳转登录 跳转
//                echo "<scrip>"
                // 发邮件
//                $url = url('Mail/send',[$email,$uname,$code]);
//                file_get_contents($url); https 无效
                // 发送http请求
                $url = "http://www.shop.com/Mail/send?email=$email&uname=$uname&code=$code";
                // http https 都可以发
                $this->juhecurl($url);
                return redirect('Home/Index/login');

            } else {
                // 注册失败
                return redirect('Home/Index/register');

            }

        }else{
            return redirect('Home/Index/register');
        }


    }
    // ajax 验证用户名是否存在
    public function ajax_checkUname(){
        $uname = Input::get('uname');
        // first 一条记录
        $row = DB::table('member')->where(['uname'=>$uname])->first();
//        dd($row);
        if($row){
            // 不能注册
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        return response()->json($data);
    }

    // qq登录的回调
    public function callback(){
        $code = Input::get('code');
        // 通过 code 获取access_Token
        $access_token = $this->getAccessTokenByCode($code);
        // 通过 access_Token 获取openid
        $openid = $this->getOpenIdByAccessToken($access_token);
        // 通过openid获取用户的基本信息
        $userinfo = $this->getUserInfoByOpenId($access_token,$openid);
        // 写
       $data['openid'] = $openid;
       $data['nickname'] = $userinfo->nickname;

            //插入
//        $this->insertQQ($data);
        //存session

        return redirect("/");

    }
    // 通过 code 获取access_Token
    public function getAccessTokenByCode($code){
        $redirect_uri = urlencode("http://www.shop.com/Index/callback");

// 2.通过code获取accessToken

        $url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=".self::APP_ID."&client_secret=".self::APP_KEY."&code={$code}&redirect_uri={$redirect_uri}";

        $res = file_get_contents($url);

        $r = explode("&",$res);
        $accessToken =  (explode("=",$r[0]))[1];

        return $accessToken;

    }

    // 通过 access_Token 获取openid
    public function  getOpenIdByAccessToken($accessToken){
        // 3.通过accessToken 获取openid
        $url = "https://graph.qq.com/oauth2.0/me?access_token=$accessToken";

        $res = file_get_contents($url);

        $str =  substr($res,strpos($res,'(')+1,strpos($res,")")-strpos($res,"(")-1);
        $obj = json_decode($str);
        return  $obj->openid;
    }

    // 通过openid获取用户的基本信息
    public function getUserInfoByOpenId($accessToken,$openid){
        // 4.根据openid(腾讯分配给网站的用户唯一标识,用于区分不同的用户身份)来获取用户信息
        $url = "https://graph.qq.com/user/get_user_info?access_token=$accessToken&oauth_consumer_key=".self::APP_ID."&openid={$openid}";

        $userinfo = file_get_contents($url);
        var_dump($userinfo);
        $userinfo = json_decode($userinfo);
        return $userinfo;
    }


    public function checkQQIsExist($openid){
       $row =  DB::table('qq_user')->where(['openid'=>$openid])->first();
       if($row){
           return false;
       }else{
           return true;
       }
    }

//    public function insertQQ($data){
//        $openid = $data['openid'];
//        if($this->checkQQIsExist($openid)){
//            $row =  DB::table('qq_user')->insertGetId($data);
//        }
//
//    }


    public function activeMember(){
        $code = Input::get('code');



        // 修改 此code 对应的用户的status = 2
        DB::table('member')->where('code',$code)->update(['status'=>2]);
        return redirect(url('Home/Index/login'));
    }
    public function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }


    public function sendSms(){
//        $phone = Input::get('phone');
        $phone = '17772156585';
        $code = mt_rand(100000,999999);
        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => '41f0a4b6b607156e04d1a41bf2edccbf', //您申请的APPKEY
            'mobile'    => $phone, //接收短信的用户手机号码
            'tpl_id'    => '192548', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>"#code#={$code}&#company#=我的商城" //您设置的模板变量，根据实际情况修改
        );

        $paramstring = http_build_query($params);
        $content = $this->juhecurl($url, $paramstring);
        dump($content);
        $result = json_decode($content, true);
        if ($result) {
                if(!$result['error_code']){
                    // 短信发送成功
                    Session::put('code',$code);
                    Session::put('timeout',time()+300);
                }
        } else {
            //请求异常
        }
    }


    // 登录页面
    public function login(){
        $returnUrl = urldecode(Input::get('returnUrl','/'));

        $url = urlencode("http://www.shop.com/Index/callback");
        return view('Home/Index/login',['url'=>$url,'returnUrl'=>$returnUrl]);

    }

    // 登录处理
    public function loginAction(){
        $returnUrl = Input::get('returnUrl','/');
        $uname = Input::get('uname');
        $upass = md5(Input::get('upass'));
        $where = compact('uname','upass');
        $row = DB::table('member')->where($where)->first();
        if($row){
            // 登录成功
            Session::put('uid',$row->id);
            Session::put('uname',$row->uname);
            return redirect($returnUrl);
        }else{

            return redirect(url('Home/Index/login'));
        }
    }

    // 退出
    public function loginOut(){
        // 清session
        Session::forget('uid');
        Session::forget('uname');
        // 跳转登录页面
        return redirect(url('Home/Index/login'));
    }
}
