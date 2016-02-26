<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HockeyMom extends CI_Controller {
	public function index(){
      $this->load->view("hockeyMom");
  }
  public function ko(){
      $this->load->view("hockeyMomko");
  }
}
