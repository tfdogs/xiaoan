<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>�һ�����-��������</title>
<center>
<div id="login">
<h2>��������</h2><p>
<?php 
/*С����ƽ̨-΢���� �һ������������ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
if(@$_SESSION["email"]==null)
{ header("Location:../");}	
$emailcode=@$_POST['ck'];
if($emailcode==null){die("<font color='red'><b>������������֤�룡</b></font><a href='./' >����</a>");}
if($emailcode!=$_SESSION["email"]){die("<font color='red'><b>������֤�����</b></font><a href='./' >����</a>");}
?>
<form name="login" action="cpwdok.php" method=post>
��&nbsp;&nbsp;��&nbsp;&nbsp;��:<input type=password name="pwd1"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;" maxlength="15" placeholder="���ܳ���15λ�ַ�"><p>
����������:<input type=password name="pwd2"  style="border:0px;border-bottom:red 2px solid;background:none;outline: none;" maxlength="15" ><p>
<input name="log" type=submit value="�޸�����">&nbsp;<a href="./">����</a>&nbsp;
</div>
</center>
</body>