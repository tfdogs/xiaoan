<?php
header("Content-type:text/html;charset=gb2312");
include("../common/install_header.php");
echo "<h3>�ڶ���-<span class='label label-info'>���������ü��</span></h3>";
if(file_exists("../common/config.php"))
{die ("��ɾ��./common/config.php ����ܰ�װ��<a href='index.php' class='btn btn-primary'>����</a>");}
?>
<p>��װ���򽫶����ķ��������û������м�⣬��ȷ��������Ŀ�������������Ҫ��
���������Ҫ���ǿ�а�װ������ܻᵼ�°�װʧ�ܻ��߰�װ���޷�ʹ�õĺ����</p>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>���ܻ�״̬</th>
        <th>�������Ҫ��</th>
        <th>��ǰ����</th></tr>
    </thead>
    <tbody>
      <tr>
        <td>PHP�汾</td>
        <td>5.3+</td>
        <td><b><font color="<?php
        if (version_compare(PHP_VERSION, '5.0.0') >= 0) 
        {echo"green";}
        else {echo "red";}
        ?>
        ">
        <?php echo PHP_VERSION;?>
        </font></b></td></tr>
      <tr>
        <td>�������ݿ⺯����mysql_connect</td>
        <td>֧��</td>
        <td><b>
        <?php
        if (function_exists('mysql_connect'))
        {echo "<font color='green'>֧��</font>";}
        else
        {echo "<font color='red'>��֧��</font>";}
        ?></b></td></tr>
      <tr>
        <td>ִ��SQL��亯����mysql_query</td>
        <td>֧��</td>
        <td><b>
        <?php
        if (function_exists('mysql_query'))
        {echo "<font color='green'>֧��</font>";}
        else
        {echo "<font color='red'>��֧��</font>";}
        ?></b></td></tr>
      <tr>
        <td>�����ļ�conn.php֧��д�����</td>
        <td>֧��</td>
        <td><b>
        <?php
        if (is_writable("../conn.php")) 
        {echo "<font color='green'>֧��</font>";}
        else
        {echo "<font color='red'>��֧��</font>";}
        ?></b></td></tr>
    </tbody>
  </table>
  
<center>
����ȷ�Ϸ��������þ�֧�֣���
<a href="step-3.php" class="btn btn-primary">������װ</a>��
<a href="index.php" class="btn btn-primary">����</a></center>
</body>
</html>