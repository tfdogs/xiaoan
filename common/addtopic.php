<?php
session_start();
if(@$_SESSION["user"]==null){
    die("<script> alert('����δ��¼�����¼��ע��!');history.go(-1);</script>");
}
require_once("./config.php");
require_once("./conn.php");
$action=$_REQUEST["action"];
if ($action=="newtopic"){ _newtopic();}
elseif ($action=="newreply"){_newreply();}
else{die("<script> alert('��Ч�Ĳ���!');window.navigate('../');</script>");}
function _newtopic(){
    $title=@$_POST['title'];
    $topic=@$_POST['topic'];
    $time = date('Y-m-d h:m:s');
    $user=$_SESSION["user"];
    if ($title && $topic)
    {
        mysql_query("insert into wtb_titles values (null,'$user','$title','$time','$topic','no','no')") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
	die("<script> alert('�����ɹ�!');window.navigate('../');</script>");
    }
    else{die("<script> alert('���������ӱ��������!');window.navigate('../');</script>");}
}
function _newreply(){
    $reply=@$_POST['reply'];
    if ($reply=="                " or $reply==null){die("<script>alert('������ظ�����!');history.go(-1);</script>");}
    $tid=@$_REQUEST["tid"];
    is_numeric($tid) or die("<script> alert('��Ч�Ĳ���!');history.go(-1);</script>");
    if($tid<=0){die("<script> alert('tid������������!');history.go(-1);</script>");}
    $tid=round($tid);
    $time = date('Y-m-d h:m:s');
    $user=$_SESSION["user"];
    mysql_query("insert into wtb_reply values (null,'$tid','$user','$reply','$time')") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
    die("<script> alert('�����ɹ�!');history.go(-1);</script>");
}