<meta http-equiv="content-type" content="text/html;charset=gb2312">
<?php 
/*С��΢���� �û�����ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
if(@$_SESSION["user"]==null)
{header("Location:../user/login.php");}
if($_SESSION["admin"]==null)
{header("Location:./adminlogin.php");}
require_once("../conn.php");//�������ݿ������ļ�
$action=@$_REQUEST['action'];//��ȡ����

function _del(){
    $uid=@$_REQUEST['uid'];
    if($uid==null){die("<b><font color='red'>UIDΪ��!</font></b><a href='user.php'>����</a>");}
	$sql = "SELECT * FROM wtb_users WHERE uid='$uid'";
    $rs = mysql_query($sql);
	if(!$rs){die("�������ݿ�ʱ���ִ���01<a href='user.php'>����</a>");}
	$row = mysql_fetch_row($rs);
	if($row[1]==$_SESSION["user"])
	  {die("<b><font color='red'>$row[1],������ɾ���Լ�!</font></b><a href='user.php'>����</a>");}
    if($row[4]=="admin")
	  {die("<b><font color='red'>".$_SESSION["user"].",������ɾ����վ����Ա$row[1]!</font></b><a href='user.php'>����</a>");}
    $sql = "DELETE FROM wtb_users WHERE uid='$uid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�������ݿ�ʱ���ִ���02<a href='user.php'>����</a>");}
	$sql = "DELETE FROM wtb_userinfo WHERE uid='$uid'";
    $rs = mysql_query($sql);
    if(!$rs){die("�������ݿ�ʱ���ִ���03<a href='user.php'>����</a>");}
    echo "<b><font color='green'>�û�(uid:$uid,�û���:$row[1])ɾ���ɹ�!</font></b><a href='user.php'>����</a>";
}

if($action=="del")
{
	 _del();exit;
}
/*
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
*/
?>