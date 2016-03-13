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
	public function getCurrentNoti($userIdx){
	// return $this->db->query("select * from notice n where n.idx not in (select notif.idx from notification notif join cookie_user c on notif.read_user=c.idx where c.idx='$userIdx')");
	return $this->db->query("select i.idx, i.n_timestamp, n.title, n.content, i.noticeId  from notification i join notice n on n.idx=noticeId join cookie_user c on c.idx=read_user where read_user=$userIdx limit 10");
	}
	public function getUnreadNotiCnt($userIdx){
		return $this->db->query("select COUNT( * ) FROM (SELECT * FROM  notification WHERE read_user =$userIdx LIMIT 10) k WHERE k.check =0");
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
