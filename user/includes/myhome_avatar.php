<?php 
error_reporting(E_ALL || ~E_NOTICE); //��ʾ��ȥ E_NOTICE ֮������д�����Ϣ
if(@$_SESSION["user"]==null){header("Location:../");}	
?>
<div id="fundetail">
<center><h4>ͷ�����</h4></center>
<table><tr><td>�ҵ�ͷ��</td><td>ϵͳĬ��ͷ��</td><td>�ϴ�ͷ��</td></tr>
<tr><td>
<img src="../common/images/avatar/<?php
$file = "../common/images/avatar/".$_SESSION["user"].".png";
if(file_exists($file))
  { echo $_SESSION["user"];}
else
  {echo "default_avatar";}
?>
.png"  height="100" width ="100" />&nbsp;
</td><td>
<img src="../common/images/avatar/default_avatar.png"  height="100" width ="100" />&nbsp;
</td><td>
<form enctype="multipart/form-data" method="post" name="upform">
  <input name="upfile" type="file">
  <input type="submit" value="�ϴ�"><p>
  </form>
</td></tr></table><p>
<?php
/******************************************************************************
����˵��:
$max_file_size  : �ϴ��ļ���С����, ��λBYTE
$destination_folder : �ϴ��ļ�·��
$watermark   : �Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);

ʹ��˵��:
1. ��PHP.INI�ļ������"extension=php_gd2.dll"һ��ǰ���;��ȥ��,��Ϊ����Ҫ�õ�GD��;
2. ��extension_dir =��Ϊ���php_gd2.dll����Ŀ¼;
******************************************************************************/
//�ϴ��ļ������б�
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2097152;     //�ϴ��ļ���С����, ��λBYTE
$destination_folder="../common/images/avatar/"; //�ϴ��ļ�·��
$watermark=0;      //�Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);
$watertype=1;      //ˮӡ����(1Ϊ����,2ΪͼƬ)
$waterposition=1;     //ˮӡλ��(1Ϊ���½�,2Ϊ���½�,3Ϊ���Ͻ�,4Ϊ���Ͻ�,5Ϊ����);
$waterstring="http://www.baidu.com/";  //ˮӡ�ַ���
$waterimg="xplore.gif";    //ˮӡͼƬ
$imgpreview=1;      //�Ƿ�����Ԥ��ͼ(1Ϊ����,����Ϊ������);
$imgpreviewsize=1/1;    //����ͼ����
?>
<style type="text/css">
<!--
input
{
     background-color: #66CCFF;
     border: 1px inset #CCCCCC;
}
-->
</style> <p>
�����ϴ����ļ�����Ϊ:<?=implode(', ',$uptypes)?>
 <br><b>ͼƬ��С������100*100</b>��ͼƬ��С����2MB<p>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))
    //�Ƿ�����ļ�
    {
         echo "ͼƬ������!";
         exit;
    }

    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //����ļ���С
    {
        echo "�ļ�̫��!";
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //����ļ�����
    {
        echo "�ļ����Ͳ���!".$file["type"];
        exit;
    }

    if(!file_exists($destination_folder))
    {
        mkdir($destination_folder);
    }

    $filename=$file["tmp_name"];
    $image_size = getimagesize($filename);
	
	if($image_size[0]!=$image_size[1])
    {
        echo "ͼƬӦ�������";
        exit;
    }  
	
		if($image_size[0]!=100)
    {
        echo "ͼƬ����Ӧ��Ϊ100����";
        exit;
    }  
	
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.$_SESSION["user"].".png";
	/*
    if (file_exists($destination) && $overwrite != true)
    {
        echo "ͬ���ļ��Ѿ�������";
        exit;
    }
*/
    if(!move_uploaded_file ($filename, $destination))
    {
        echo "�ƶ��ļ�����";
        exit;
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo[basename];
    echo " <font color=red>�Ѿ��ɹ��ϴ�</font><br>�ļ���:  <font color=blue>".$destination_folder.$fname."</font><br>";
    echo " ���:".$image_size[0];
    echo " ����:".$image_size[1];
    echo "<br> ��С:".$file["size"]." bytes����".($file["size"]/1000)."KB";

    if($watermark==1)
    {
        $iinfo=getimagesize($destination,$iinfo);
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
        $white=imagecolorallocate($nimage,255,255,255);
        $black=imagecolorallocate($nimage,0,0,0);
        $red=imagecolorallocate($nimage,255,0,0);
        imagefill($nimage,0,0,$white);
        switch ($iinfo[2])
        {
            case 1:
            $simage =imagecreatefromgif($destination);
            break;
            case 2:
            $simage =imagecreatefromjpeg($destination);
            break;
            case 3:
            $simage =imagecreatefrompng($destination);
            break;
            case 6:
            $simage =imagecreatefromwbmp($destination);
            break;
            default:
            die("��֧�ֵ��ļ�����");
            exit;
        }

        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

        switch($watertype)
        {
            case 1:   //��ˮӡ�ַ���
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
            break;
            case 2:   //��ˮӡͼƬ
            $simage1 =imagecreatefromgif("xplore.gif");
            imagecopy($nimage,$simage1,0,0,0,0,85,15);
            imagedestroy($simage1);
            break;
        }

        switch ($iinfo[2])
        {
            case 1:
            //imagegif($nimage, $destination);
            imagejpeg($nimage, $destination);
            break;
            case 2:
            imagejpeg($nimage, $destination);
            break;
            case 3:
            imagepng($nimage, $destination);
            break;
            case 6:
            imagewbmp($nimage, $destination);
            //imagejpeg($nimage, $destination);
            break;
        }

        //����ԭ�ϴ��ļ�
        imagedestroy($nimage);
        imagedestroy($simage);
    }

    if($imgpreview==1)
    {
    echo "<br>ͼƬԤ��:<br>";
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
    echo " alt=\"ͼƬԤ��:\r�ļ���:".$destination."\r�ϴ�ʱ��:\">";
    }
}
?>
</body>
</html>