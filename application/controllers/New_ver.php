<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_ver extends CI_Controller {
	public function home()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_home');
	}
	public function shuttle()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_shuttle');
	}
	public function menu()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_menu');
	}
	public function reserve()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_reserve');
	}
	public function call()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_call');
	}
}
