<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
	}
	public function test()
	{
		$this->load->view('header');
		$this->load->view('test');
		$this->load->view('footer');
	}
	public function proxy()
	{
		$this->load->view('header');
		$this->load->view('proxy');
		$this->load->view('footer');
	}
}
