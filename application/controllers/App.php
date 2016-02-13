<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function register()
	{
		$this->load->view('app/register');
	}
	public function gcmSender(){
		$this->load->view('app/gcmSender_func');
	}
}
