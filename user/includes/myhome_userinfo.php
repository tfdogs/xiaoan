<?php
/*������ϢԤ����*/
if(@$_SESSION["user"]==null){header("Location:../");}
$user=$_SESSION["user"];
$rs = mysql_query("SELECT * FROM wtb_users where usr='$user'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
$row = mysql_fetch_row($rs);
$uid=$row[0];
$rs = mysql_query("SELECT * FROM wtb_userinfo where uid='$uid'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
$row = mysql_fetch_row($rs) ;
$sex=$row[1];
$date=$row[2];
$regtime=$row[3];
$email=$row[4];
?>
<div id="fundetail">
    <center><h4>������Ϣ����</h4></center>
        <form name="c" action="" method=post>
            <table class="table">
                <tr>
                    <td>
                        <b>�û���:<p></b><?php echo $user;?>
                    </td>
                    <td>
                        <b>uid:<p></b><?php echo $uid;?> 
                    </td>
                    <td>
                        <b>�Ա�<p></b><input type="radio" name="sex" id="man" value="1" <?php if($sex==1) echo " checked=\"checked\""; ?> /> ��
                        <input type="radio" name="sex" id="woman" value="2" <?php if($sex==2) echo " checked=\"checked\""; ?> /> Ů
                    </td>
                    <td>
                       <b>����:</b><input type="date" name="date" class="form-control" value="<?php echo $date; ?>" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>ע��ʱ�䣺<p></b><?php echo $regtime;?>
                    </td>
                    <td>
                        <b>�������䣺</b><input type = "text" class="form-control" name="email" value="<?php echo $email;?>" required>
                    </td>
                    <td>       
                        
                    </td>
                </tr>
            </table>
            <input name="c" type=submit value="�ύ">
        </form>
</div>
<?php
if(empty($_POST['c'])){exit;}
$sex= $_POST["sex"];
$date= $_POST["date"];
$email= $_POST["email"];
if($sex==null){$sex=1;}
mysql_query("update wtb_userinfo set sex=$sex where uid='$uid'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
mysql_query("update wtb_userinfo set birthday='$date' where uid='$uid'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('../');</script>");
if (strstr($email,"@")==false){
    die ("<script> alert('���������ʽ����!');window.navigate('./myhome.php?action=myinfo');</script>"); 
}
mysql_query("update wtb_userinfo set email='$email' where uid='$uid'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./myhome.php?action=myinfo');</script>");
mysql_query("update wtb_users set email='$email' where uid='$uid'") or die("<script> alert('ִ�����ݿ��ѯʱ���ִ�������ϵ��վ����Ա��'); window.navigate('./myhome.php?action=myinfo');</script>");
die("<script> alert('������Ϣ�޸ĳɹ���'); window.navigate('./myhome.php?action=myinfo');</script>");
?>