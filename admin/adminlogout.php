<meta http-equiv="content-type" content="text/html;charset=gb2312">
<body bgcolor="#F0F8FF">
<title>�˳���½</title>
<center>
<div id="login">
<h2>�˳������¼</h2><p>
�˳������½���ʺţ�<b><?php
 /*С����ƽ̨-΢���� �û��˳���½ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������*/ 
session_start();
echo(@$_SESSION["admin"]);
unset($_SESSION["admin"]);//�������Ϊadmin��session���˳������¼
 ?>
 </b><p>���Ѿ��˳������½��<p>
 <a href="../">����</a>&nbsp;<a href="./adminlogin.php">���µ�½</a>
 </div>
</center>
<link rel="stylesheet" type="text/css" href="../css/login.css" />
</body>