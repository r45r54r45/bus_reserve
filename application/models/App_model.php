<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function regit($data){
		return $this->db->query("replace into regit_list values ('$data')");
	}
	public function getRegits(){
		return $this->db->query("select * from regit_list");
	}

}
