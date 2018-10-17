<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {
	 function __construct()
	{
		parent::__construct();
	}

	
	public function send_email()
	{
	$this->email->initialize(array
	(


		'protocol'      => 'smtp',
		'smtp_host'     => 'smtp.mailtrap.io',
		'smtp_user'     => '88cf62e0bba9ea',
		'smtp_pass'     => '05441c11fe3c3d',
		'smtp_port'     => 2525,
		'crlf'          => "\r\n",
		'newline'       => "\r\n",
                //'smtp_crypto'   =>  'tls',
		'mailtype'      => 'html',
		'wordwrap'      => TRUE
	));

	$this->email->from('bhagyashree.watkar@cloudesign.in','bhagyashree watkar');
	$this->email->to('nakshine.bhagyashree@gmail.com');
	$this->email->subject('test email');
	$this->email->message('testing an email');

	//$userid=$this->db->insert_id();
	//print_r($userid);


	if($this->email->send())
	{
		//echo "email send sucessfully";
		$response['rc']=true;
		$response['msg']='email send successfully';
					
	}
	else
	{
		//show_error($this->email->print_debugger());
		$response['rc']=false;
		$response['msg']='email send failed';

	}
	return $response; 
}

}
