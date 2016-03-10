<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function help_add(){
		return $this->db->query("	");
	}
	public function getUserInfo($cookieId){
		$r= $this->db->query("select * from cookie_user where cookie='$cookieId'");
		var_dump($r);
		return $r->result();
	}
	public function setUserInfo($cookieId){
		return $this->db->query("insert into cookie_user (cookie) values  ('$cookieId')")->result();
	}
	public function food_add($date,$data1,$data2){
		return $this->db->query("insert into food values ('$date','$data1','$data2')");
	}
	public function food_get($date){
		return $this->db->query("select * from food where week_date='$date'");
	}
}
