<?php
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
$row = mysql_fetch_row(mysql_query("SELECT * FROM wtb_general_settings where gid=1"));
$webname=$row[1];
$keywords=$row[2];
$description=$row[3];
?>
<div id="fundetail">
    <center><h4>վ���������</h4></center>
    <form name="c" action="" method=post>
        <table class="table">
            SEO����:<p>
            <tr>
                <td>��վ���ƣ�title��:</td>
                <td>
                    <input type=text name="webname"  value="<?php echo $webname; ?>" class="form-control" required>
                </td>
                <td>����ѡ��</td>
            </tr>
            <tr>
                <td>�ؼ��ʣ�keywords��:</td>
                <td>
                    <input type=text name="keywords" value="<?php echo $keywords; ?>" class="form-control">
                </td>
                <td>ѡ��ѡ�������</td>
            </tr>
            <tr>
                <td>������description��:</td>
                <td>
                    <input type=text name="description" value="<?php echo $description; ?>" class="form-control">
                </td>
                <td>ѡ��ѡ�������</td>
            </tr>
        </table>
        <input name="c" type=submit value="��������" class="btn btn-success btn-lg">
        <a href="./index.php?action=settings"><button class="btn btn-info">����</button></a>
    </form>
</div>
</body>
<?php
if(empty($_POST['c'])){exit;}
$webname=@$_POST['webname'];
$keywords=@$_POST['keywords'];
$description=@$_POST['description'];
if($webname==null){die ("<script> alert('��վ����Ϊ��!');window.navigate('./index.php?action=settings');</script>");}
mysql_query("update wtb_general_settings set name='$webname',keywords='$keywords',description='$description' where gid=1");
die ("<script> alert('���ñ���ɹ�!');window.navigate('./index.php?action=settings');</script>");