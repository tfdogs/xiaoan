<?php 
session_start();
if(!empty($_POST['log'])){ _login();}
if(@$_SESSION["user"]!=null){ header("Location:../");}	
function _login(){
    require_once("../common/config.php");
    require_once("../common/conn.php");
    $username=@$_POST['username'];
    $passowrd=@$_POST['password'];
    if($username==null or $passowrd==null){
        echo "<script> alert('����д�û���������!');window.navigate('./login.php');</script>"; 
    }
    $passowrd=md5(@$_POST['password']);
    if(preg_match("/[\'.,:;*?~`!#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$username)){ 
        echo "<script> alert('�û������������зǷ��ַ���');window.navigate('./login.php'); </script>";
    }
    $res = mysql_query("SELECT * FROM wtb_users WHERE (usr = '$username' or email = '$username') and pwd='$passowrd'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./login.php');</script>");
    $rows=mysql_num_rows($res);
    if($rows){
        $rows=mysql_fetch_row($res);
        $_SESSION["user"] = $rows[1];
        echo "<script>alert('�װ���".$rows[1]."����ӭ������');window.navigate('../');</script>";
    }
    else{
         echo "<script> alert('�û������������'); window.navigate('./login.php');</script>";
         
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="gb2312">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../common/css/login.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <style type="text/css">
         body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <title>С�������û���¼</title>
    </head>
    <body>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">��ҳ</a></li>
                <li class="active"><a href="./login.php">�û���¼</a></li>
                </ol>
            </div>
            <div id="login">
                    <ul class="nav nav-pills nav-justified">
                      <li><a href="#">��¼</a></li>
                      <li class="active"><a href="./register.php">ע��</a></li>
                    </ul>
            <div style="padding: 50px 100px 19px 50px;">
            	<center><form class="form-inline" name="login" role="form" action="" method=post>
            		<table  border = "0" cellpadding = "4">
                  <tr><table>
                         <td  align = "center">�û���</td>
                         <td><input type = "text" class="form-control" name="username" placeholder="�������û���������" required></td>
                  </tr>
                  <tr>
                         <td  align = "center">����</td>
                         <td><input type = "password" class="form-control" name="password" placeholder="����������" required></td>
                 </tr>
                 <tr>
             <td colspan = "2" align = "center">
                         <input name="log" type = "submit" class="btn btn-primary" value = "��¼">
                         <a class="btn btn-warning" href="#">�������룿</a></td>
                         </tr></table>            
            	</form></center>
            </div>
            </div>
    </body>
    <footer>
    <div>&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">С������</a>حV0.2.0</div>
    </footer>
</html>
