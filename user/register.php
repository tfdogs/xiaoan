<?php 
session_start();
date_default_timezone_set('PRC');
if(!empty($_POST['reg'])){ _register();}
if(@$_SESSION["user"]!=null){ header("Location:../");}	
function _register(){
    require_once("../common/config.php");
    require_once("../common/conn.php");
    $username=@$_POST['username'];
    $password=@$_POST['password'];
    $email=@$_POST['email'];
    $code=@md5($_POST['code']);
    $password2=@$_POST['password2'];
    if($username==null or $password==null or $email==null or $password2==null){
        die ("<script> alert('����д�����Ϣ!');window.navigate('./register.php');</script>"); 
    }
    if($code!= $_SESSION["verification"]){
        die ("<script> alert('��֤�����!');window.navigate('./register.php');</script>");
    }
    if($password!=$password2){
        die ("<script> alert('������������벻һ�£�����������!');window.navigate('./register.php');</script>");
    }
    if (strstr($email,"@")==false){
        die ("<script> alert('���������ʽ����!');window.navigate('./register.php');</script>"); 
    }
    $res = mysql_query("SELECT * FROM wtb_users WHERE usr = '$username' ") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա error in register.php line 25��'); window.navigate('./register.php');</script>");
    $rows=mysql_num_rows($res);
    if($rows){
        die ("<script> alert('���û����ѱ�ע��!');window.navigate('./register.php');</script>");        
    }
    $res = mysql_query("SELECT * FROM wtb_users WHERE email = '$email'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա error in register.php line 30��'); window.navigate('./register.php');</script>");
    $rows=mysql_num_rows($res);
    if($rows){
        die ("<script> alert('�õ��������ѱ�ע��!');window.navigate('./register.php');</script>");        
    }
    $password=md5($password);
    mysql_query("insert into wtb_users  values (null,'".$username."' ,'".$password."','".$email."',0)") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա error in register.php line 36��'); window.navigate('./register.php');</script>");
    $rs = mysql_query("SELECT * FROM wtb_users where usr='".$username."'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա error in register.php line 37��'); window.navigate('./register.php');</script>");
    $row = mysql_fetch_row($rs) ;
    $uid=$row[0];
    $time = date('Y-m-d h:m:s');
    mysql_query("insert into wtb_userinfo  values ('".$uid."',1,'2016-1-1','".$time."','".$email."')") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա error in register.php line 41��'); window.navigate('./register.php');</script>");
    die ("<script> alert('�װ��� ".$username."��ע��ɹ�!');window.navigate('./login.php');</script>");     
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
        <title>С�������û�ע��</title>
        <script type="text/javascript" >
        function changing(){document.getElementById('checkpic').src="../common/checkcode.php?"+Math.random();} 
        </script>
    </head>
    <body>
        <div id="main">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">��ҳ</a></li>
                <li class="active"><a href="./register.php">�û�ע��</a></li>
                </ol>
            </div>
            <div id="login">
                    <ul class="nav nav-pills nav-justified">
                      <li class="active"><a href="./login.php">��¼</a></li>
                      <li><a href="#">ע��</a></li>
                    </ul>
            <div style="padding: 50px 100px 19px 50px;">
            	<center><form class="form-inline" name="login" role="form" action="" method=post>
            		<table  border = "0" cellpadding = "4">
                  <tr><table>
                         <td  align = "center">�û���</td>
                         <td><input type = "text" class="form-control" name="username" placeholder="���ܳ���8λ�ַ�" required></td>
                  </tr>
                  <tr>
                      <td  align = "center">��������</td>
                         <td><input type = "text" class="form-control" name="email" placeholder="��������ȷ�ĵ��������ַ" required></td>
                 </tr>                  
                  <tr>
                         <td  align = "center">����</td>
                         <td><input type = "password" class="form-control" name="password" maxlength="15" placeholder="���ܳ���15λ�ַ�" required></td>
                 </tr>
                  <tr>
                         <td  align = "center">����һ������</td>
                         <td><input type = "password" class="form-control" name="password2" maxlength="15" placeholder="���ܳ���15λ�ַ�" required></td>
                 </tr>       
                  <tr>
                         <td  align = "center">��֤��</td>
                         <td><input type = "text" class="form-control" name="code" maxlength="4" placeholder="���ͼƬ�ɻ�һ��" required>
                         <img id="checkpic" onclick="changing();" src='../common/checkcode.php' /></td>
                 </tr>                 
                 <tr>
             <td colspan = "2" align = "center">
                         <input name="reg" type = "submit" class="btn btn-primary" value = "ע��">
                         </tr></table>            
            	</form></center>
            </div>
            </div>
    </body>
    <footer>
    <div>&copy; <a rel="nofollow" href="http://xiaoanbbs.cn">С������</a>حV0.2.0</div>
    </footer>
</html>