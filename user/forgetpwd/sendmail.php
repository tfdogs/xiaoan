<?php
	/**
	 * С����ƽ̨-΢���� ������֤����ҳ �������ԣ�PHP ���ݿ⣺MYSQL �ٷ���վhttp://www.xiaoan.gq/
     * ����δ������ԭ����ͬ���������İ�Ȩ��Ϣ���ٴη������뱣������ײ���ԭ������Ϣ��
     * ������ʹ��PHP5.3����������mysql_query()���������޷���ִ�У������޷�ִ��һ�����ݿ������
	 * ע�����ʼ��඼�Ǿ����Ҳ��Գɹ��˵ģ������ҷ����ʼ���ʱ��������ʧ�ܵ����⣬������¼����Ų飺
	 * 1. �û����������Ƿ���ȷ��
	 * 2. ������������Ƿ�������smtp����
	 * 3. �Ƿ���php���������⵼�£�
	 * 4. ��26�е�$smtp->debug = false��Ϊtrue��������ʾ������Ϣ��Ȼ����Ը��Ʊ�����Ϣ��������һ�´����ԭ��
	 * 5. ������ǲ��ܽ�������Է��ʣ�http://www.daixiaorui.com/read/16.html#viewpl 
	 *    ����������У���������Ҫ�ҵĴ𰸡�
	 * 6. ǧ��Ҫ���ı��ļ��е�163��������룡�������������û�˭Ҳ�ò��ˣ�����
	 */
require_once("../../source/email.class.php");
error_reporting (E_ALL &~E_NOTICE &~E_DEPRECATED);
	//******************** ������Ϣ ********************************
	$smtpserver = "smtp.163.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = "xiaoancloud@163.com";//SMTP���������û�����
	$smtpemailto = $row[3];//���͸�˭
	$smtpuser = "xiaoancloud";//SMTP���������û��ʺ�
	$smtppass = "donotchangeit123";//SMTP���������û�����
	$mailcontent = "<meta http-equiv='content-type' content='text/html;charset=gb2312'>����������֤����:<b>".$post."</b>";//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	//************************ ������Ϣ ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state=="")
	{
		die ("<script  type='text/javascript'>alert('�Բ����ʼ�����ʧ�ܣ�����������д�Ƿ�����');</script>");	
	}
	echo "<script  type='text/javascript'>alert('��ϲ���ʼ����ͳɹ�����ע����ա�');</script>";
?>