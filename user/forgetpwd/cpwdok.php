<meta http-equiv="content-type" content="text/html;charset=gb2312">
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<body bgcolor="#F0F8FF">
<title>�һ�����-��������</title>
<center>
<div id="login">
<h2>��������</h2><p>
<?php 
/*С����ƽ̨-΢���� �һ������������ִ��ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]!=null)
{ header("Location:../");}		
$pwd1=md5(@$_POST['pwd1']);
$pwd2=md5(@$_POST['pwd2']);
if($pwd1=="d41d8cd98f00b204e9800998ecf8427e"){die("<font color='red'><b>���벻��Ϊ�գ�</b></font><a href='./' >����</a>");}
if($pwd1!=$pwd2){die("<font color='red'><b>�������벻һ�£�</b></font><a href='./' >����</a>");}
$sql = "update wtb_users set pwd='".$pwd1."' where email='".$_SESSION["useremail"]."'";
$res = mysql_query($sql);
if(!$res){die("�����޷����ӵ����ݿ�!<a href='../'>����</a>");} 
echo"<font color='green'><b>�������óɹ���</b></font>";
?>
&nbsp;<a href="../login.php">��½�ʺ�</a>
</div>
</center>
</body>