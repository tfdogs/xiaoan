<?php header("Content-type:text/html;charset=gb2312");?>
<?php include("../common/install_header.php"); ?>
<h3>���Ĳ�-<span class="label label-info">��װ���ݿ�</span></h3>
��װ��������ִ�а�װ���ݿ���������԰�����^_^��<br>
<p>
<?php 
$stime=microtime(true); 
if(file_exists("../common/config.php"))
{die ("��ɾ��./common/config.php ����ܰ�װ��<a href='index.php' class='btn btn-primary'>����</a>");}
 $db_name= @$_POST['db_name'];//���ݿ���
 $db_host= @$_POST['db_host'];//������ַ��Ĭ��Ϊlocalhost
 $db_usr= @$_POST['db_usr'];//���ݿ��û���
 $db_pwd= @$_POST['db_pwd'];//���ݿ�����
 $admin_usr= @$_POST['admin_usr'];
 $admin_email= @$_POST['admin_email'];
 $admin_pwd= @$_POST['admin_pwd'];
 if($db_name==null){die("<b><font color='red'>���ݿ���Ϊ�գ���������д��</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>");}
 /*��ʼ�������ݿ� ��24-26*/
mysql_connect( $db_host,$db_usr ,$db_pwd) or die("<b><font color='red'>�������ݿ�ʱ���������������ݿ��������ݿ������������ݿ��û��������ݿ�������д�Ƿ���ȷ��������д��</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>");
mysql_select_db( $db_name); //ѡ�����ݿ�
MySQL_query("SET NAMES 'gbk'");//���ݿ����
if($admin_usr==null){die("<b><font color='red'>�û���Ϊ�գ���������д��</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>");}
if($admin_email==null){die("<b><font color='red'>����Ϊ�գ���������д��</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>");}
if($admin_pwd==null){die("<b><font color='red'>�˺�����Ϊ�գ���������д��</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>");}
?>   
<fieldset id="tb"> 
<legend>��װ����</legend>
<?php
echo "���ڵ��밲װ��������ıر����ݱ�...<br>";
$lines=file("install.sql");
foreach($lines as $line){
  $line=trim($line);
  if($line!=""){
    if(!($line{0}=="#" || $line{0}.$line{1}=="--")){  
    mysql_query($line) or die("<b><font color='red'>ִ�����ݿ����$line ʱ��������</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>"); 
    echo "<b><font color='green'>�ɹ�</font></b>ִ��SQL���".$line."<br>";
    }
  }
}
echo "���ڵ���վ�㴴ʼ����Ϣ...<br>";
$admin_pwd=md5($admin_pwd);
$sql="INSERT INTO `wtb_users` (`uid`, `usr`, `pwd`, `email`, `admingp`) VALUES(1, '$admin_usr', '$admin_pwd', '$admin_email',2)";
mysql_query($sql) or die("<b><font color='red'>ִ�����ݿ����$sql ʱ��������</font></b><p>��װ����ֹͣ���С�<a href='./step-3.php'>����</a>"); 
echo "<b><font color='green'>�ɹ�</font></b>ִ��SQL���".$sql."<br>��������վ����Ϣ";
$myfile = fopen("../common/config.php", "w") or die("Unable to open file!");
$txt = "<?php
error_reporting (E_ALL &~E_NOTICE &~E_DEPRECATED);
/*���������ݿ����Ӵ��룬����������ģ�*/ 
define('mysql_servername','$db_host'); //������ַ��Ĭ��Ϊlocalhost
define('mysql_username','$db_usr'); //���ݿ��û���
define('mysql_password','$db_pwd');//���ݿ�����
define('mysql_database','$db_name'); //���ݿ���
?>
";
fwrite($myfile, $txt);
fclose($myfile);
$etime=microtime(true);//��ȡ����ִ�н�����ʱ��
$total=$etime-$stime;   //�����ֵ
echo "<p>��װ��ɡ���װ���̹���ʱ$total ��";
?>
</fieldset>
<span class="label label-danger">��ϲ����װ��ɣ�</span>
<div class="well" align="center">������<a href="../" class="btn btn-primary">�鿴վ��</a>�����<a href="../user/login.php" class="btn btn-primary">��½</a></div>
</body>
</html>