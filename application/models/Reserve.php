<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserve extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function addUser($id, $pw){
	return $this->db->query("insert into r_user (id, pw, point) values ('$id', '$pw', 1000)");
	}
	public function addReserve($id, $date, $week, $time, $loc, $cell){
	return $this->db->query("insert into r_reserve (r_user,	r_date,	r_week,	r_time,	r_loc, r_cell) values ('$id', '$date', '$week', '$time', '$loc', '$cell')");
	}
	public function deleteReserve($id, $cell){
		return $this->db->query("delete from r_reserve where r_user='$id' and r_cell='$cell'");
	}
	public function getPersonal($id){
		return $this->db->query("select r_cell, r_loc, r_date from r_reserve where r_user='$id'");
	}
	public function getByDate($r_date){
		$r= $this->db->query("select id, pw, r_reserve_id, r_loc, r_time from r_reserve join cookie_user on r_user=idx where r_date='$r_date'");
		return $r->result();
	}
	public function getByWeek($r_week){
		$r=  $this->db->query("select id, pw, r_reserve_id, r_loc, r_time from r_reserve join cookie_user on r_user=idx where r_week='$r_week'");
		return $r->result();
	}
}
