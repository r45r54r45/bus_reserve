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
	public function start()
	{
		$this->load->view('header');
		$this->load->view('start');
		$this->load->view('footer');
	}
	public function about()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function mypage()
	{
		$this->load->view('header');
		$this->load->view('mypage');
		$this->load->view('footer');
	}

}
