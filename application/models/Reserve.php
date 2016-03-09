<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function addUser($id, $pw){
	return $this->db->query("insert into r_user (id, pw, point) values ('$id', '$pw', 1000)");
	}
	public function addReserve($id, $date, $week, $time, $loc){
	return $this->db->query("insert into r_reserve (r_user,	r_date,	r_week,	r_time,	r_loc) values ('$id', '$date', '$week', '$time', '$loc')");
	}
	public function getByDate($r_date){
		return $this->db->query("select id, pw, r_reserve_id, r_loc, r_time from r_reserve, r_user where r_user=id and r_date='$r_date'")->result();
	}
	public function getByWeek($r_week){
		return $this->db->query("select id, pw, r_reserve_id,  r_loc, r_time from r_reserve, r_user where r_user=id and r_week='$r_week'")->result();
	}
}
