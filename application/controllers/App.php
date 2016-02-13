<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function register()
	{
		$this->load->view('app/register');
	}
	public function gcmSender(){
		$this->load->view('app/gcmSender_func');
	}
}
