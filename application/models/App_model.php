<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function regit($data){
		return $this->db->query("replace into regit_list (gcm) values ('$data')");
	}
	public function getRegits(){
		return $this->db->query("select * from regit_list");
	}
	public function isRegister($gcm,$token){
		$result=$this->db->query("select count(*) from regit_list where gcm='$gcm' and facebook_token='$token'");
		$cnt=0;
		foreach ($result->result_array as $row) {
			$cnt++;
		}
		if($cnt==0)return false;
		else return true;
	}
}
