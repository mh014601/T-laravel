<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
// 引入邮件发送类
use Mail;
class MailController extends Controller
{
    //
    public $email;
    public $title;
    public function send(){
        $uname = Input::get('uname');
        $email = Input::get('email');
        $code = Input::get('code');
        $this->email = $email;
        $title = "欢迎您注册我们网站....";
        $this->title = $title;
        $flag = Mail::send('Home.mails.test',['name'=>$uname,'code'=>$code],function($message){
            $to = $this->email;
            $message ->to($to)->subject($this->title);
        });
    }


    public function sendText(){
        $this->email = Input::get('email');
        $title = "欢迎您注册我们网站....";
        $this->title = $title;
        $activeCode = mt_rand(100000,999999);
        $content = "您好,请在30分钟内激活,激活码是:$activeCode";
        $flag = Mail::raw($content, function ($message) {
            $to = $this->email;
            $message ->to($to)->subject($this->title);
        });
        $data['status'] = 1;
        return response()->json($data);
    }
}
