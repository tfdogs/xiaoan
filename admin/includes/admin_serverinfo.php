<?php
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
?>
<div id="fundetail">
    <center>
        <h4>��������ϸ��Ϣ</h4>PHP��Ϣ
        <table class="table">
            <tr>
                <td>PHP�汾��</td>
                <td><?php echo PHP_VERSION;?></td>
                <td>ZEND�汾��</td>
                <td><?php echo Zend_Version();?></td>
            </tr>
            <tr>
                <td>PHP���з�ʽ��</td>
                <td><?php echo php_sapi_name();?></td>
                <td>PHP��װ·����</td>
                <td><?php echo DEFAULT_INCLUDE_PATH;?></td>
            </tr>
            <tr>
                <td>PHP�ű���ʱʱ�䣺</td>
                <td><?php echo ini_get("max_execution_time");?>s</td>
                <td>PHP�ļ��ϴ���С���ƣ�</td>
                <td><?php echo ini_get("upload_max_filesize");?></td>
            </tr>
        </table>
        WEB��������Ϣ
        <table class="table">
            <tr>
                <td>�������������棺</td>
                <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
            </tr>
            <tr>
                <td>������������</td>
                <td><?php echo $_SERVER["HTTP_HOST"];?></td>
                <td>MySQL�汾��</td>
                <td><?php echo mysql_get_server_info();?></td>
            </tr>
            <tr>
                <td>ǰ�����û�����</td>
                <td><?php echo Get_Current_User();?></td>
                <td>������Web�˿ڣ�</td>
                <td><?php echo $_SERVER['SERVER_PORT'];?></td>
            </tr>
        </table>
        ������ϵͳ��Ϣ
        <table class="table">
            <tr>
                <td>����������ϵͳ��</td>
                <td><?php echo php_uname();?></td>
            </tr>
            <tr>
                <td>������������</td>
                <td><?php echo GetHostByName($_SERVER['SERVER_NAME']);?></td>
                <td>������CPU��Ϣ��</td>
                <td><?php echo $_SERVER['PROCESSOR_IDENTIFIER'];?></td>
            </tr>
            <tr>
                <td>������ϵͳĿ¼��</td>
                <td><?php echo $_SERVER['SystemRoot'];?></td>
                <td>���������ԣ�</td>
                <td><?php echo  $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td>
            </tr>
            <tr>
                <td>������IP��ַ��</td>
                <td><?php echo $_SERVER['SERVER_PORT'];?></td>
                <td>������ʱ�䣺</td>
                <td><?php echo date('Y-m-d H:i:s',time());?></td></tr>
            </table>
            ������Ϣ
        <table class="table">
            <tr>
                <td>��ǰ�ļ�����·����</td>
                <td><?php echo __FILE__;?></td>
                <td>�ͻ���IP��ַ��</td>
                <td><?php echo $_SERVER['REMOTE_ADDR'];?></td>
            </tr>
            <tr>
                <td>��ǰURL��</td>
                <td><?php echo 'http(s)://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?></td>
                <td>��ǰ�ͻ���ʱ�䣺</td>
                <td><div id="time"></div></td>
            </tr>
        </table>
            <iframe src="./includes/admin_phpinfo.php" height="500" width="100%" border="0" frameborder="no"></iframe>
    </center>
</div>
<script type="text/javascript">  
    //��ȡϵͳʱ�䣬��ʱ����ָ����ʽ��ʾ��ҳ�档  
    function systemTime()  
    {  
        //��ȡϵͳʱ�䡣  
        var dateTime=new Date();  
        var hh=dateTime.getHours();  
        var mm=dateTime.getMinutes();  
        var ss=dateTime.getSeconds();   
        //����ʱ����һλ���֣�������ǰ��0��  
        mm = extra(mm);  
        ss = extra(ss);     
        //��ʱ����ʾ��IDΪtime��λ�ã�ʱ���ʽ���磺19:18:02  
        document.getElementById("time").innerHTML=hh+":"+mm+":"+ss;            
        //ÿ��1000msִ�з���systemTime()��  
        setTimeout("systemTime()",1000);  
    }      
    //��λ������  
    function extra(x)  
    {  
        //�����������С��10������ǰ��һλ0��  
        if(x < 10)  
        {  
            return "0" + x;  
        }  
        else  
        {  
            return x;  
        }  
    }  
</script>  