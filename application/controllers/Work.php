<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('work');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('_login');
	}
	public function cancel()
	{
		$this->load->view('_cancel');
	}
	public function reserve()
	{
		$this->load->view('_reserve');
	}

}
