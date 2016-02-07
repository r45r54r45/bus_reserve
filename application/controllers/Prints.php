<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('print_main');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('header');
		$this->load->view('print_login');
		$this->load->view('footer');
	}
}
