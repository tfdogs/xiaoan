<?php
session_start();
require_once("../common/config.php");
require_once("../common/conn.php");
$user=@$_SESSION["user"];
if($user==null){header("Location:../user/login.php");}
$row=mysql_fetch_row(mysql_query("SELECT * FROM wtb_users WHERE usr='$user'"));
if ($row[4]==0){header("Location:../");}
/* $row[4]�����ݱ�wtb_users �ֶ�admingp���
 * $row[4]=0�����û���ƽ̨����Ա����ӵ�й���Ȩ��
 * $row[4]=1�����û�Ϊƽ̨��ͨ����Ա��ӵ�в��ֹ���Ȩ��
 * $row[4]=2�����û�Ϊƽ̨��������Ա��ӵ��ȫ������Ȩ��
*/
?>
<html>
    <head>
        <title>С��������������</title>
        <link rel="stylesheet" type="text/css" href="../common/css/home.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <style>
        body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <script src="../common/js/jquery.min.js"></script>
        <script src="../common/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html;charset=gb2312">
    </head>
    <body onload="systemTime()">
        <div id="myhome">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">��ҳ</a></li>
                <li class="active"><a href="./myhome.php">��������</a></li>
                </ol>
            </div>
            <?php
            if(@$_SESSION["admin"]==null){
            require_once './includes/admin_login.php';
            exit;}
            ?>
            <div id="funlist">
                <div id="mainzt">ȫ�ֹ���<p></div>
                <a href="./index.php?action=index">����������ҳ</a><p><p>
                <a href="./index.php?action=serverinfo">��������ϸ��Ϣ</a><p>
                <a href="./index.php?action=settings">վ���������</a><p>
                <div id="mainzt">���ӹ���<p></div>
                <a href="./index.php?action=topics">����������</a><p><p>
                <div id="mainzt">�û�����<p></div>
                <a href="./index.php?action=users">�û�����</a><p>
            </div>
            <?php
            $action=@$_REQUEST["action"];
            if($action=="serverinfo"){
                require_once './includes/admin_serverinfo.php';
            }
            elseif($action=="settings"){
                require_once './includes/admin_settings.php';
            }
            elseif($action=="topics"){
                require_once './includes/admin_topics.php';
            }
            elseif($action=="users"){
                require_once './includes/admin_users.php';
            }/*
            elseif($action=="changepwd"){
                require_once './includes/myhome_changepwd.php';
            }
            else{
                require_once './includes/admin_index.php';
            }*/
            ?>
        </div>
    </body>
</html>