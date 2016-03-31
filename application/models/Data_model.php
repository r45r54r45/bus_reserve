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
		return $this->db->query("select * from cookie_user where id='$id' and pw='$pw' and idx='$final_userIdx' and auth='1'");
	}
	public function gorilla_join($id, $pw, $final_userIdx){
		mail("r54r45r54@gmail.com","새로운 고릴라 인간 추가","아이디는 : ".$id);
		return $this->db->query("update cookie_user set id='$id', pw='$pw', auth='1' where idx='$final_userIdx'");
	}
	public function normal_join($id, $pw, $final_userIdx){
		mail("r54r45r54@gmail.com","새로운 인간 추가","아이디는 : ".$id);
		return $this->db->query("update cookie_user set id='$id', pw='$pw', auth='2' where idx='$final_userIdx'");
	}
	public function get_auth($final_userIdx){
		return $this->db->query("select auth from cookie_user where idx='$final_userIdx'");
	}
	public function addBanana($id, $num){
	 $this->db->query("update cookie_user set banana=banana+$num where idx='$id'");
	 return $this->db->query("select banana from cookie_user where idx='$id'");
	}
	public function auto_login_add($user,$code){
		return $this->db->query("insert into auto_login (user, code) values ('$user','$code')");
		// return $this->->db->query("select code from auto_login where user='$user'");
	}
	public function auto_login_verify($user){
		return $this->db->query("select * from auto_login where user='$user'");
	}
	public function auto_login_delete($user){
		return $this->db->query("delete from auto_login where user='$user'");
	}
	public function auto_login_getUser($code){
		return $this->db->query("select id,pw from cookie_user c join auto_login a on c.idx=a.user where a.code='$code'");
	}
	public function getUserRank($user){
		return $this->db->query("select count(*)+1 as rank from cookie_user cuser where (select banana from cookie_user where idx='$user') < cuser.banana");
	}
	public function getUserId($user){
		return $this->db->query("select id from cookie_user where idx='$user'");
	}
	public function getUserName($user){
		return $this->db->query("select name from cookie_user where idx='$user'");
	}
	public function getUserBanana($user){
		return $this->db->query("select banana from cookie_user where idx='$user'");
	}
	public function getAllRankResult(){
		return $this->db->query("select name, banana from cookie_user  order by banana desc");
	}
}
