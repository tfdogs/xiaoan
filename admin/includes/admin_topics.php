<div id="fundetail">
    <center><h4>����������</h4></center>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>�����û�</td>
            <td>���ӱ���</td>
            <td>����ʱ��</td>
            <td>��������</td>
            <td>��������</td>
            <td>����</td>
        </tr>
        <?php
            session_start();
            if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
            $rs = mysql_query("SELECT * FROM wtb_titles order by tid desc");
            while($row = mysql_fetch_row($rs)) 
            {
            	echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>".substr($row[2],0,24)."</td>";
	            echo "<td>$row[3]</td>";
                    echo "<td>".substr($row[4],0,48)."</td>";
                    echo "<td>";
                    if($row[5]==1){echo "��ͨ��";}
                        elseif($row[5]==2){echo "�ö���";}
                        elseif($row[5]==3){echo "������";}
                    else{echo "�ö�����������";}
                    echo "</td>";
            	echo "<td><a href='./index.php?action=topics&settype=0&tid=$row[0]'>ɾ��</a> ";
            	if($row[5]==1 or $row[5]==3){
                        echo"<a href='./index.php?action=topics&settype=";
                        if($row[5]==1){echo "2";}
                        else{echo "4";}
                        echo "&tid=$row[0]'>�ö� </a>";
                    }else{
                        echo"<a href='./index.php?action=topics&settype=";
                        if($row[5]==2){echo "1";}
                        else{echo "3";}
                        echo "&tid=$row[0]'>ȡ���ö� </a>";
                }
            	if($row[5]==1 or $row[5]==2){
                        echo"<a href='./index.php?action=topics&settype=";
                        if($row[5]==1){echo "3";}
                        else{echo "4";}
                        echo "&tid=$row[0]'>��Ϊ������ </a>";
                    }else{
                        echo"<a href='./index.php?action=topics&settype=";
                        if($row[5]==3){echo "1";}
                        else{echo "2";}
                        echo "&tid=$row[0]'>ȡ�������� </a>";
                }
	            echo"</td></tr>";
            }
        ?>
    </table>
</div>
<?php
$settype=@$_REQUEST["settype"];
$tid=@$_REQUEST["tid"];
if($settype==null or $tid==null){exit;}
is_numeric($settype) or die("<script> alert('��Ч�Ĳ���!');window.navigate('./');</script>");
is_numeric($tid) or die("<script> alert('��Ч�Ĳ���!');window.navigate('./');</script>");
mysql_query("UPDATE wtb_titles SET topictype='$settype' WHERE tid=$tid");
die("<script> alert('�����ɹ�!');window.navigate('./index.php?action=topics');</script>");
?>