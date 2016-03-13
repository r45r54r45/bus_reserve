<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function getAllUser(){
		return $this->db->query("select * from cookie_user");
	}
	public function uploadAndGetNoticeIdx($type, $title, $content, $target){
		$this->db->query("insert into notice (type, title, content, target) values ('$type', '$title', '$content', '$target')");
		return $this->db->query("select max(idx) from notice");
	}
	public function pushNoti($nIdx, $user){
		return $this->db->query("insert into notification (noticeId, user) values ('$nIdx', '$user')");
	}

}
