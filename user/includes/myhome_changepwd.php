<div id="fundetail">
    <center><h4>�޸�����</h4></center>
    <form name="c" action="" method=post>
        ԭ&nbsp;��&nbsp;��:<input type=password name="pwd0" maxlength="15" class="form-control" required="">
        ��&nbsp;��&nbsp;��:<input type=password name="pwd1" maxlength="15" class="form-control" required>
        ����������:<input type=password name="pwd2" maxlength="15" class="form-control" required>
        <input name="c" type=submit value="�޸�����" class="btn btn-success btn-lg">
    </form>
    <?php
        session_start();
        $user=@$_SESSION["user"];
        if(user==null){header("Location:../");}	
        $pwd0=@$_POST['pwd0'];
        $pwd1=@$_POST['pwd1'];
        $pwd2=@$_POST['pwd2'];
        if(empty($_POST['c'])){exit;}
        if($pwd0==null or $pwd1==null or $pwd2==null){die ("<script> alert('����������ж�����Ϊ��!');window.navigate('./myhome.php?action=changepwd');</script>");}
        if($pwd1!=$pwd2){die ("<script> alert('��������������벻һ��!');window.navigate('./myhome.php?action=changepwd');</script>");}
        $pwd0=md5($pwd0);
        $pwd1=md5($pwd1);
        $pwd2=md5($pwd2);
        $res =mysql_query("SELECT * FROM wtb_users WHERE (usr = '$user' or email = '$user') and pwd='$pwd0'");
        $rows=mysql_num_rows($res);
        if(!$rows){die("<script> alert('ԭ�������!');window.navigate('./myhome.php?action=changepwd');</script>");}
        mysql_query("update wtb_users set pwd='$pwd1' where (usr='$user' or email = '$user')");
        unset($_SESSION["user"]);//�������Ϊuser��session���˳���¼
        echo"<script>alert('�����޸ĳɹ�!');window.navigate('./login.php')</script>";
    ?>
    ��<a href="./login.php" target="RightFrame">���µ�½</a>
</div>