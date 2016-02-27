<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_ver extends CI_Controller {
	public function home()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_home');
		$this->load->view('menu_footer');
	}
	public function shuttle()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_shuttle');
		$this->load->view('menu_footer');
	}
	public function menu()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_menu');
		$this->load->view('menu_footer');
	}
	public function reserve()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_reserve');
		$this->load->view('menu_footer');
	}
	public function call()
	{
		$this->load->view('menu_header');
		$this->load->view('menu_call');
		$this->load->view('menu_footer');
	}
}
