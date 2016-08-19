<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		// $this->load->view('header');
		$this->load->view('menu_home.php');
		// $this->load->view('footer');
	}
	public function forIosChrome(){
		$this->load->view('forIosChrome');
	}
	public function api()
	{
		// $this->load->view('header');
		$this->load->view('api');
		// $this->load->view('footer');
	}
	public function test2()
	{
		$this->load->view('menu_header');
		$this->load->view('test2');
		$this->load->view('menu_footer');
	}
	public function storeList()
	{
		$this->load->view('menu_header');
		$this->load->view('store_list');
		$this->load->view('menu_footer');
	}
	public function more_delivery_chicken2()
	{
		$this->load->view('menu_header');
		$this->load->view('more_delivery_chicken2');
		$this->load->view('menu_footer');
	}
	public function test3()
	{
		$this->load->view('menu_header');
		$this->load->view('test3');
		$this->load->view('menu_footer');
	}
	public function nshuttle()
	{
		$this->load->view('menu_header');
		$this->load->view('normal_shuttle');
		$this->load->view('menu_footer');
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
