<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function help()
	{
		require_once(APPPATH.'libraries/coolsms.php');
		$api_key = 'NCS53C2A831865B7';
		$api_secret = 'BEF1FE1C24C72F28C488728F91A2C838';

		$rest = new coolsms($api_key, $api_secret);

		$options->type = "LMS";
		$options->to = "01071097327";
		$options->from = "01071097327";
		$options->text = $_GET['data'];
		$rest->send($options);
	}
	public function getCookieUser($cookieId){
		$this->load->model("data_model");
		$result=$this->data_model->getUserInfo($cookieId);
		if($result->num_rows==0)echo "no row";
		foreach ($result as $data) {
			if($data!=null){
				//등록된 id가 존재할 경우
				echo var_dump($data);
			}else{
				//회원으로 등록 안되어 있는 경우
				$arr=array();
				$arr["result"]=false;
				echo json_encode($arr);
				$this->data_model->setUserInfo($cookieId);

			}
		}
	}
	public function addUser($id, $pw){
		$this->load->model("reserve");
		$this->reserve->addUser($id, $pw);
	}
	public function addReserve($id, $date, $week, $time, $loc){
		$this->load->model("reserve");
		$this->reserve->addReserve($id, $date, $week, $time, $loc);
	}
	public function run(){
		//- 일단 대상이 되는 항목을 모두 가져옴
		//1. 특정 일만 하는 경우
		//2. 특정 요일만 하는 경우

		// 그래도 예약은 날짜로 확인해서 하는건데 말이지
		//그러면 week(요일)로 정기적으로 신청한 것에 대해서는 알맞는 날짜를 자동으로 구해서 해줘야하는거지...
		date_default_timezone_set('Asia/Seoul');
		$r_date=date("Ymd",strtotime("+2 day"));
		echo $r_date;
		//target r_date
		$r_week=date("w",strtotime("+2 day"));
		echo $r_week;
		//target r_week
		$this->load->model("reserve");
		$result_date=$this->reserve->getByDate($r_date);
		$result_week=$this->reserve->getByWeek($r_week);
		$result=array_merge($result_date,$result_week);
		//비동기
		foreach($result as $case){
			$case->id;
			$case->pw;
			$case->r_reserve_id;
			$case->r_date;
			$case->r_loc;
			$case->r_time;
		}
	}
	public function food()
	{
		$a; $b;
		$this->load->model("data_model");
		$result=$this->data_model->food_get(date("Y-m-d"));
		foreach ($result->result() as $row)
		{
        $a= $row->data_1;
        $b= $row->data_2;
		}
		$aa=explode('|',$a); //6개
		$bb=explode('|',$b);

		$f1=array();
		$f2=array();
		$f3=array();
		for ($i=0; $i < 6; $i++) {
			if($i==0||$i==1)array_push($f1,$aa[$i]);
			if($i==2||$i==3)array_push($f2,$aa[$i]);
			if($i==4||$i==5)array_push($f3,$aa[$i]);
		}
		$one=array($f1,$f2,$f3);
		$f1=array();
		$f2=array();
		$f3=array();
		for ($i=0; $i < 6; $i++) {
			if($i==0||$i==1)array_push($f1,$bb[$i]);
			if($i==2||$i==3)array_push($f2,$bb[$i]);
			if($i==4||$i==5)array_push($f3,$bb[$i]);
		}
		$two=array($f1,$f2,$f3);
		$arr = array ($one,$two);
		echo json_encode($arr);
	}
	public function food_add()
	{
		$this->load->model("data_model");
		$this->data_model->food_add($_POST['date'],$_POST['data1'],$_POST['data2']);

	}
	public function bus91()
	{
				$this->load->view('header');
		$this->load->view("bus91");
				$this->load->view('footer');
	}
	public function bus6724()
	{
				$this->load->view('header');
		$this->load->view("bus6724");
			$this->load->view('footer');
	}
}
