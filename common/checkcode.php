<?php  
session_start();
 function random($len) {
     $srcstr = "1a2s3d4f5g6hj8k9qwertyupzxcvbnm";
     mt_srand();
     $strs = "";
     for ($i = 0; $i < $len; $i++) {
         $strs .= $srcstr[mt_rand(0, 30)];
     }
     return $strs;
 }
 $str = random(4); //������ɵ��ַ���
 $width  = 50;  //��֤��ͼƬ�Ŀ��
 $height = 25;//��֤��ͼƬ�ĸ߶�
 @ header("Content-Type:image/png");//������Ҫ������ͼ���ͼƬ��ʽ
 $im = imagecreate($width, $height);//����һ��ͼ��
 $back = imagecolorallocate($im, 0xFF, 0xFF, 0xFF); //����ɫ
 $pix  = imagecolorallocate($im, 187, 230, 247); //ģ������ɫ
 $font = imagecolorallocate($im, 41, 163, 238); //����ɫ
 mt_srand(); //��ģ�����õĵ�
 for ($i = 0; $i < 1000; $i++) {
     imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
 }
 imagestring($im, 5, 7, 5, $str, $font); //����ַ�
 imagerectangle($im, 0, 0, $width -1, $height -1, $font); //�������
 imagepng($im); //���ͼƬ
 imagedestroy($im);
$str=md5($str);
 //ѡ�� Session
 $_SESSION["verification"] = $str;
 ?>
