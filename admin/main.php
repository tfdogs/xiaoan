<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php 
/*С����ƽ̨-΢���� ����������ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]==null)
{header("Location:../user/login.php");}
if($_SESSION["admin"]==null)
{header("Location:./adminlogin.php");}	
?>
<body style="margin:0;">
<div style="width:15%; float:left;background:#F0F8FF;">
<a href="./main.php">����������ҳ</a><p><p>
<a href="./general.php">ȫ�ֹ���</a><p>
<a href="./topic.php">����������</a><p>
<a href="./reply.php">�ظ�������</a><p>
<a href="./user.php">�û�����</a><p>
<!--<a href="./notice.php">֪ͨ����</a><p>
<a href="./changepwd.php">�޸�����</a><p>-->
</div>
<div style="width:85%; float:left;background:#F0FFF0;">
<center><h4><b>����������ҳ</b></h4></center>
��ǰ����汾��<b>С��΢����/for PHP V0.1���԰�</b><p>
��ǰ��¼�Ĺ���Ա�ʺţ�<b><?php echo $_SESSION["admin"];?></b>
<p><p><hr><b>��������Ϣ��</b><br>
����������ϵͳ��<?php echo php_uname();?><br><p><p>
�������������棺<?php echo $_SERVER['SERVER_SOFTWARE'];?><br><p>
PHP�汾��<?php echo PHP_VERSION;?><br><p>
������IP��ַ��<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br><p>
������������<?php echo $_SERVER["HTTP_HOST"];?><br><p>
<a herf="#" onclick="phpinfo()">�쿴phpinfo</a>&nbsp;<a herf="#" onclick="serverinfo()">�쿴��������ϸ��Ϣ</a>
</div>
</body>
<SCRIPT type="text/javascript"> 
function phpinfo(){window.open ('phpinfo.php','newwindow','status=no') }
function serverinfo(){window.open ('serverinfo.php','newwindow','status=no') }
</SCRIPT>