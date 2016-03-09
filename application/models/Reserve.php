<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function addUser($id, $pw){
	return $this->db->query("insert into r_user (id, pw, point) values ($id, $pw, 1000)");
	}

	public function food_add($date,$data1,$data2){
		return $this->db->query("insert into food values ('$date','$data1','$data2')");
	}
	public function food_get($date){
		return $this->db->query("select * from food where week_date='$date'");
	}
}
