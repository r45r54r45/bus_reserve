<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HockeyMom extends CI_Controller {
	public function index(){
      $this->load->view("hockeyMom");
  }
}
