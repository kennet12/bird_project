<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Email {

	var $_mail;
	 
	public function config($data)
	{
		$this->_mail=array(
			'from_sender'       => !empty($data['from_sender']) ? $data['from_sender'] : MAIL_INFO,
			'name_sender'       => !empty($data['name_sender']) ? $data['name_sender'] : MAIL_INFO,
			'to_receiver'       => !empty($data['to_receiver']) ? $data['to_receiver'] : '',
			'cc'       			=> !empty($data['cc']) ? $data['cc'] : '',
			'bcc'       		=> !empty($data['bcc']) ? $data['bcc'] : '',
			'subject_sender'    => !empty($data['subject']) ? $data['subject'] : 'No reply',
			'message'       	=> !empty($data['message']) ? $data['message'] : '',
			'attachment'		=> !empty($data['attachment']) ? $data['attachment'] : '',
		);
	}
	
	public function sendmail()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('util');
		$this->ci->load->model('m_mail');
		
		$config = array(
			'protocol'		=> 'smtp',
			'useragent'		=> COMPANY,
			'mailpath'		=> '',
			'smtp_host'		=> 'smtp.gmail.com',
			'smtp_port'		=> '465',
			'smtp_timeout'	=> '10',
			'smtp_user'		=> 'noreply@visa-vietnam.org.vn',
			'smtp_pass'		=> 'GmailVs2016Orgvn',
			'charset'		=> 'UTF-8',
			'mailtype'		=> 'html',
			'validation'	=> TRUE,
			'smtp_crypto'	=> 'ssl'
		);
		
		$this->initialize($config);
		$this->set_newline("\r\n");
		
		$this->from($this->_mail['from_sender'], $this->_mail['name_sender']);
		$this->reply_to($this->_mail['from_sender'], $this->_mail['name_sender']);
		$this->to($this->_mail['to_receiver']);
		
		if (!empty($this->_mail['cc'])) {
			$this->cc($this->_mail['cc']);
		}
		
		if (!empty($this->_mail['bcc'])) {
			$this->bcc($this->_mail['bcc']);
		}
		
		if (!empty($this->_mail['attachment'])) {
			$this->attach($this->_mail['attachment']);
		}
		
		if ($this->_mail['to_receiver'] == MAIL_INFO) {
		}

		$this->subject($this->_mail['subject_sender']);
		$this->message($this->_mail['message']);
		
		$this->send();
		
		if ($this->_mail['to_receiver'] == MAIL_INFO) {
			$data = array(
				'sender'	=> $this->_mail['from_sender'],
				'receiver'	=> $this->_mail['to_receiver'],
				'title'		=> $this->_mail['subject_sender'],
				'message'	=> $this->_mail['message']
			);
			$this->ci->m_mail->add($data);
		}
		
		$this->clear(TRUE);
	}
}