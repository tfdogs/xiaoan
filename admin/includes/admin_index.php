<?php
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
?>
<div id="fundetail">
    <center><h4>����������ҳ</h4></center>
    ��ǰ����汾��С������ XiaoanBBS 0.2.0 Alpha<p>
    ����ٷ���վ��<a href="http://xiaoanbbs.cn" target="_blank">http://xiaoanbbs.cn</a><p>
    ��ǰ��¼�Ĺ���Ա�ʺţ�<?php echo $_SESSION["admin"];?>
    <hr>��������Ϣ��<br>
    ����������ϵͳ��<?php echo php_uname();?><br><p><p>
    �������������棺<?php echo $_SERVER['SERVER_SOFTWARE'];?><br><p>
    PHP�汾��<?php echo PHP_VERSION;?><br><p>
    ������IP��ַ��<?php echo GetHostByName($_SERVER['SERVER_NAME']);?><br><p>
    ������������<?php echo $_SERVER["HTTP_HOST"];?><br>
</div>
