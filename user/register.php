<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /user/register.php
 */
/*配置文件检测*/
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/install.php");
}

/*基础参数赋值*/
$baseurl = '..';
$body = 'register.partial.php';

/*引入初始文件*/
require_once '../common/includes/common.php';

/*检测用户是否已登录*/
session_start();
if ($_SESSION["user"]) {
    $_SESSION["welcome"]=5;
    header("location:../index.php");
}

/*用户注册操作*/
if (!empty($_POST['log'])) {
    $usr = $_POST["username"];
    $pwd = $_POST["password"];
    $pwd2 = $_POST["password2"];
    $eml = $_POST["email"];
    $code = $_POST["checkcode"];

    if (empty($usr)) {
        array_push($page['message']['error'], '用户名为空');
    }
    if (empty($pwd)) {
        array_push($page['message']['error'], '密码为空');
    }
    if (empty($pwd2)) {
        array_push($page['message']['error'], '密码为空');
    }
    if ($pwd != $pwd2) {
        array_push($page['message']['error'], '密码输入不一致');
    }
    if (empty($eml)) {
        array_push($page['message']['error'], '邮箱为空');
    }
    if (strstr($eml, "@") == false) {
        array_push($page['message']['error'], '邮箱格式错误');
    }

    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误');
    }

    $pwd=md5($pwd);//密码MD5加密
    if (empty($page['message']['error'])) {
        try {
            $user = User::register($usr, $pwd, $eml,0);
            $_SESSION["user"] = $user;
            $_SESSION["welcome"]=2;
            header("location:../index.php");
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

/*参数赋值*/
$page['sidebar']['content'] = 'sidebar-login.php';
$page['body']['class'] = 'register';
$page['header']['title'] = '注册，探索崭新世界!';

/*引入模板*/
require '../template/layout.php';