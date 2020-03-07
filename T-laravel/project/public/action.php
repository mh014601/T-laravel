<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/4
 * Time: 15:23
 */

$pic = $_FILES['pic'];
echo "<pre>";
print_r($pic['name']);
print_r($pic['tmp_name']);

$crr = array_combine($pic['name'],$pic['tmp_name']);

foreach ($pic['tmp_name'] as $k=>$v){
    $ext = explode('.',$k)[1];
    $filename = $k.time().'.'.$ext;
    move_uploaded_file($v,"./upload/$filename");


}
