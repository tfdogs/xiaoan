<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>�һ�����-��֤����</title>
<center>
<div id="login">
<h2>��֤����</h2><p>
<?php 
/*С����ƽ̨-΢���� �һ�������֤����ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
$email=@$_POST['email'];
$code=md5(@$_POST['code']);
if($email==null){die("<font color='red'><b>�������û��������䣡</b></font><a href='./' >����</a>");}
if($code=="d41d8cd98f00b204e9800998ecf8427e"){die("<font color='red'><b>��������֤�룡</b></font><a href='./' >����</a>");}
if($code!=$_SESSION["verification"]){die("<font color='red'><b>��֤�����</b></font><a href='./' >����</a>");}
if(strstr($email,"'")){die("<font color='red'><b>�û����зǷ��ַ���</b></font><a href='./' >����</a>");}
require_once("../../conn.php");//�������ݿ������ļ�
$sql = "SELECT * FROM wtb_users WHERE usr = '$email' or email = '$email'";
$res = mysql_query($sql);
if(!$res){die("�����޷����ӵ����ݿ�!<a href='../'>����</a>");} 
$rows=mysql_num_rows($res);
if(!$rows){die("<font color='red'><b>�û��������䲻���ڣ�</b></font><a href='./' >����</a>");}
$row=mysql_fetch_row($res);
?>
<script  type="text/javascript">
alert("����������������<?php
echo substr($row[3],0,3);
$str=strlen($row[3])- 11;
$i=1;//��ʼ���ۼ���ֵ
while($i<=$str)
{echo "*";$i++;}
echo substr($row[3],strlen($row[3])- 8,strlen($row[3]));
?>����һ����֤��Ϣ���뽫���յ�����֤����������������");
</script>
<?php
//$_SESSION["useremail"]=$row[3];
$emailcode=md5($row[1].$row[2].rand(1, 1000));
$post=substr($emailcode,0,8);
$_SESSION["email"]=$post;
require_once("sendmail.php");
?>
<form name="login" action="changepwd.php" method=post>
������֤��:<input type=text name="ck"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
<p>
<input name="log" type=submit value="����">&nbsp;<a href="./">����</a>&nbsp;
</form>
</div>
</center>
</body>