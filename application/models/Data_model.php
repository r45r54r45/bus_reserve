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
		return $r;
	}
	public function getUnreadNoti($cookieId){
	return $this->db->query("select * from notice n where n.idx not in (select notif.idx from notification notif join cookie_user c on notif.read_user=c.idx where c.idx='')");
	// "select * from notification n join cookie_user c, notice n on read_user=";
	}

	public function setUserInfo($cookieId){
		return $this->db->query("insert into cookie_user (cookie) values  ('$cookieId')");
	}
	public function food_add($date,$data1,$data2){
		return $this->db->query("insert into food values ('$date','$data1','$data2')");
	}
	public function food_get($date){
		return $this->db->query("select * from food where week_date='$date'");
	}
}
