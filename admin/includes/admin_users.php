<div id="fundetail">
    <center><h4>�û�����</h4></center>
    <table class="table">
        <tr>
            <td>UID</td>
            <td>ͷ����û���</td>
            <td>ע��ʱ��</td>
            <td>�Ա�</td>
            <td>�û���</td>
            <td>����</td>
        </tr>
        <?php
            session_start();
            if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
            $rs = mysql_query("SELECT * FROM wtb_users ORDER BY uid DESC");
            while($row = mysql_fetch_row($rs)){
	        echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td><img src='../common/images/avatar/";
                $file = "../common/images/avatar/$row[1].png";
                if(file_exists($file)){ echo $row[1];}
                else{echo "default_avatar";}
                echo ".png'  height='80' width ='80' />$row[1]";
	        $rows = mysql_fetch_row(mysql_query("SELECT * FROM wtb_userinfo WHERE uid=$row[0]"));
	        echo "</td>";
                echo "<td>$rows[3]</td>";
                echo "<td>";
                if($rows[1]==1){echo "��";}
                else {echo "Ů";}
                echo "</td>";
                echo "<td>";
                if($row[4]==1){echo"��ͨ����Ա";}
                elseif($row[4]==2){echo"��������Ա";}
                else{echo"��ͨ�û�";}
                echo "</td>";
	        require("./includes/admin_del_usr.php");
	        echo "</tr>";
            }
        ?>
    </table>
</div>
<?php
$mode=@$_REQUEST["mode"];
$uid=@$_REQUEST["uid"];
if($mode==null or $uid==null){exit;}
is_numeric($uid) or die("<script> alert('��Ч�Ĳ���!');window.navigate('./index.php?action=users');</script>");
function _del(){
    $uid=@$_REQUEST["uid"];
    $row = mysql_fetch_row(mysql_query("SELECT * FROM wtb_users WHERE uid='$uid'"));
    if($row[4]!=0){
        die("<script> alert('������ɾ��ƽ̨����Ա!');window.navigate('./index.php?action=users');</script>");
    }
    mysql_query("DELETE FROM wtb_users WHERE uid=$uid");
    mysql_query("DELETE FROM wtb_userinfo WHERE uid=$uid");
    die("<script> alert('�û�(uid:$uid,�û���:$row[1])ɾ���ɹ�!');window.navigate('./index.php?action=users');</script>");
}
if($mode=="del"){
    _del();exit;
}



