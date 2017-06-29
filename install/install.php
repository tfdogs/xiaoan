<?php
/*配置文件检测*/
if (file_exists("../common/config.php")){
    die ("请删除配置文件./common/config.php 后才能安装！<a href='../' class='btn btn-primary'>返回</a>");
}
/*基础参数赋值*/
$baseurl = '..';
$body = 'myhome.partial.php';

/*引入初始文件*/
require_once '../common/includes/common.php';
/*引入Model类*/
require_once '../model/Home.php';

/*帖子分页预处理*/
$pge=Site::pagefirst(@$_REQUEST["page"]);
/*判断用户是否登录*/
session_start();
if ($_SESSION["user"] != null) {
    $user = $_SESSION["user"];
}else{
    header("location:../");
}
/*判断action参数是否合法*/
$action = array("index","avatar","myinfo","mytopic","message","changepwd");
$page['body']['action'] = @$_REQUEST["action"];
if (!(in_array($page['body']['action'] , $action))){
    $page['body']['action'] = 'index';
}
/*导入具体操作代码*/
require '../common/includes/myhome-inculdes.php';
/*获取页码*/
$pagination = array();
Site::pagination($pge,"./myhome.php?action=".$page['body']['action']."&page=");


$page['body']['class'] = 'myhome';
$page['header']['title'] = '个人中心';
/*引入模板*/
require '../template/layout.php';

