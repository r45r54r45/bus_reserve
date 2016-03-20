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
	public function setNotiRead($noti_idx){
		return $this->db->query("update notification set read_check=1 where idx='$noti_idx';");
	}
	public function getCurrentNoti($userIdx){
	// return $this->db->query("select * from notice n where n.idx not in (select notif.idx from notification notif join cookie_user c on notif.read_user=c.idx where c.idx='$userIdx')");
	return $this->db->query("select n.target, i.idx, i.n_timestamp, n.title, n.content, i.noticeId, n.type, i.read_check from notification i join notice n on n.idx=noticeId join cookie_user c on c.idx=read_user where read_user=$userIdx order by i.idx desc limit 10 ");
	}
	public function getUnreadNotiCnt($userIdx){
		return $this->db->query("select COUNT( * ) FROM (SELECT * FROM  notification WHERE read_user =$userIdx LIMIT 10) k WHERE k.read_check =0");
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
	public function getNotice(){
		return $this->db->query("select * from noticeBoard order by idx desc");
	}
	public function addReserve($user, $loc, $date, $day, $time){
		return $this->db->query("insert into reserveList values ('$user', '$loc', '$date', '$day', '$time')");
	}
	public function gorilla_login($id, $pw, $final_userIdx){
		return $this->db->query("select * from cookie_user where id='$id' and pw='$pw' and idx='$final_userIdx'");
	}
	public function gorilla_join($id, $pw, $final_userIdx){
		return $this->db->query("update cookie_user set id='$id', pw='$pw' idx='$final_userIdx'");
	}
	public function addBanana($id, $num){
	 $this->db->query("update cookie_user set banana=banana+$num where idx='$id'");
	 return $this->db->query("select banana from cookie_user where idx='$id'");
	}
}
