<meta http-equiv="content-type" content="text/html;charset=gb2312">
<?php 
/*С��΢���� �������ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]==null)
{header("Location:../user/login.php");}
if($_SESSION["admin"]==null)
{header("Location:./adminlogin.php");}
require_once("../conn.php");//�������ݿ������ļ�
$action=@$_REQUEST['action'];//��ȡ����
$tid=@$_REQUEST['tid'];
if($action=="del")
{
	$sql = "DELETE FROM wtb_titles WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(1)<a href='topic.php'>����</a>");}
	$sql = "DELETE FROM wtb_reply WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(2)<a href='topic.php'>����</a>");}
	echo "<b><font color='green'>ɾ���ɹ�!</font></b><a href='topic.php'>����</a>";
	exit;
}
elseif($action=="top")
{
	$sql = "UPDATE wtb_titles SET iftop='yes' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(3)<a href='topic.php'>����</a>");}
	echo "<b><font color='green'>�ö��ɹ�!</font></b><a href='topic.php'>����</a>";
}
elseif($action=="ctop")
{
	$sql = "UPDATE wtb_titles SET iftop='no' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(4)<a href='topic.php'>����</a>");}
	echo "<b><font color='green'>ȡ���ö��ɹ�!</font></b><a href='topic.php'>����</a>";
}
elseif($action=="good")
{
	$sql = "UPDATE wtb_titles SET ifgood='yes' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(5)<a href='topic.php'>����</a>");}
	echo "<b><font color='green'>�Ӿ��ɹ�!</font></b><a href='topic.php'>����</a>";
}
elseif($action=="cgood")
{
	$sql = "UPDATE wtb_titles SET ifgood='no' WHERE tid='$tid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�����޷����ӵ����ݿ�!(6)<a href='topic.php'>����</a>");}
	echo "<b><font color='green'>ȡ���Ӿ��ɹ�!</font></b><a href='topic.php'>����</a>";
}
?>