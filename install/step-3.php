<?php 
header("Content-type:text/html;charset=gb312");
include("../common/install_header.php");
echo "<h3>������-<span class='label label-info'>��д���ݿ⼰��ʼ����Ϣ</span></h3>";
if(file_exists("../common/config.php"))
{die ("��ɾ��./common/config.php ����ܰ�װ��<a href='index.php' class='btn btn-primary'>����</a>");}
?>
<p>��װ����Ҫ������д����վ�����ݿ⼰��ʼ����Ϣ��<br>
ֻ����д��ȷ����Ϣ�󣬰�װ�������������վ�����ݿ��²������ݱ��Լ���վ��ʼ�����ݲ��������С���д�������Ϣ���ᵼ�±�����װʧ�ܡ�
</p>
<form name="login" action="step-4.php" method=post >  
<fieldset id="tb">
<legend><strong>1.���ݿ���Ϣ</strong></legend>
    <table width="635" border="0">
     <tr>
        <td width="112">���ݿ��������</td>
        <td width="245"><input type="text" value="localhost" class="form-control" name="db_host" ></td>
        <td>*���ݿ�ķ�������ַ��һ��Ϊlocalhost</td>
      </tr>
      <tr>
        <td>���ݿ��û�����</td>
        <td><input type="text" value="root" class="form-control" name="db_usr"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>���ݿ����룺</td>
        <td><input type="text" value="" class="form-control" name="db_pwd"></td>
        <td>&nbsp;</td>
       </tr>
       <tr>
        <td>���ݿ�����</td>
        <td><input type="text" class="form-control" name="db_name"></td>
        <td>*</td>
       </tr>
     </table>
</fieldset>
<fieldset id="tb">
<legend><strong>2.����Ա��Ϣ</strong></legend>
<table width="635" border="0">
       <tr>
        <td>�����û���</td>
        <td><input type="text"class="form-control" name="admin_usr"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>����Ա����</td>
        <td><input type="text"class="form-control" name="admin_pwd"></td>
        <td>*</td>
       </tr>
       <tr>
        <td>����Ա����</td>
        <td><input type="text"class="form-control" name="admin_email"></td>
        <td>*���ڽ����������ѡ�©���޸���</td>
       </tr>
     </table>
  </fieldset>
<center>����ȷ��������Ϣ����д��ȷ����<input name="log" type = "submit" class="btn btn-success btn-lg" value = "������װ">
��<a href="step-2.php" class="btn btn-primary">����</a></center>
</form>
</body>
</html>