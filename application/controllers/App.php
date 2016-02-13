<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function register()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		$this->load->model("app_model");
		$this->app_model->regit($obj['regId']);
	}
	public function gcmSender(){
		$this->load->view('app/gcmSender_func');
	}
}
