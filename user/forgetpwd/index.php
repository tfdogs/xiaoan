<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>�һ�����</title>
<center>
<div id="login">
<h2>�һ�����</h2><p>
<form name="login" action="checkemail.php" method=post>
�û���:<input type=text name="email" placeholder="�������û���������" style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
��֤��:<input type=text name="code" maxlength="4" placeholder="���ͼƬ�ɻ�һ��" style="border:0px;border-bottom:red 2px solid;background:none;outline: none;"><p>
<p>
<input name="log" type=submit value="����">&nbsp;<a href="../login.php">����</a>&nbsp;
<img id="checkpic" onclick="changing();" src='../../source/checkcode.php' />
</form>
<script type="text/javascript" >
function changing(){document.getElementById('checkpic').src="../../source/checkcode.php?"+Math.random();} 
</script>
<?php 
/*С����ƽ̨-΢���� �һ�������ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}	
?>
</div>
</center>
</body>