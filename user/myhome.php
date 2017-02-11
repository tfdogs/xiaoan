<?php
session_start();
if(@$_SESSION["user"]==null){header("Location:../");}	
?>
<html>
    <head>
        <title>�ҵĸ�������-<?php echo $_SESSION["user"];?></title>
        <style>
        a img{border:none}
        .testdiv *{vertical-align:middle;}
        body {background-image:url(../common/images/bg_<?php echo(rand(1,3));?>.jpg);}
        </style>
        <link rel="stylesheet" type="text/css" href="../common/css/home.css" />
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <script src="../common/js/jquery.min.js"></script>
        <script src="../common/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html;charset=gb2312">
        <script type="text/javascript">
        function logout(){
            self.location='../'; 
        }
        </script>
    </head>
    <body>
        <div id="myhome">
            <div id="search">
                <ol class="breadcrumb">
                <li><a href="#"><a href="../">��ҳ</a></li>
                <li class="active"><a href="./myhome.php">�ҵĸ�������-<?php echo $_SESSION["user"];?></a></li>
                </ol>
            </div>
            <div class="testdiv" >
                <a href="../source/upload-avatar.php" target="_blank" title="����ͷ�񣬵��ͷ��ͼƬ�ɸ���ͷ��"><img src="../common/images/avatar/<?php
                 $file = "../common/images/avatar/".$_SESSION["user"].".png";
                if(file_exists($file))
                  { echo $_SESSION["user"];}
                else
                  {echo "default_avatar";}
                ?>.png"  height="80" width ="80" /></a>
                <span><font size='6' color="purple">�ҵĸ�������-<?php echo $_SESSION["user"];?></font></span>
                <button onclick='logout()' class=lgbtn>������ҳ</button>
            </div>
            <hr style=" height:4px;border:none;border-top:2px dotted green;" />
            <div id="funlist">
                <a href="./myhome.php?action=index">����������ҳ</a><p><p>
                <a href="./myhome.php?action=avatar">ͷ�����</a><p>
                <a href="./myhome.php?action=myinfo">������Ϣ����</a><p>
                <a href="./myhome.php?action=mytopic">�ҵ�����</a><p>
                <a href="./myhome.php?action=message">��Ϣ����</a><p>
                <a href="./myhome.php?action=changepwd">�޸�����</a><p>
            </div>
            <?php
            require '../common/config.php';
            require '../common/conn.php';
            $action=@$_REQUEST["action"];
            if($action=="avatar"){
                require_once './includes/myhome_avatar.php';
            }
            elseif($action=="myinfo"){
                require_once './includes/myhome_userinfo.php';
            }
            elseif($action=="mytopic"){
                require_once './includes/myhome_mytopic.php';
            }
            elseif($action=="message"){
                require_once './includes/myhome_message.php';
            }
            elseif($action=="changepwd"){
                require_once './includes/myhome_changepwd.php';
            }
            else{
                require_once './includes/myhome_index.php';
            }
            ?>
        </div>
    </body>
</html>