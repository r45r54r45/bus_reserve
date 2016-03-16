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
		if($result->num_rows()==0){
			$this->data_model->setUserInfo($cookieId);
		}else{
			$data=$result->row();
			echo json_encode($data);
		}
		}
	public function setNotiRead($noti_idx){
		$this->load->model("data_model");
		$result=$this->data_model->setNotiRead($noti_idx);
	}
	public function getUnreadNotiCnt($userIdx){
		$this->load->model("data_model");
		$result=$this->data_model->getUnreadNotiCnt($userIdx);
		$row=$result->result_array();
		$arr=array();
		$kkk=$row[0];
		$arr['count']=$kkk['COUNT( * )'];
		echo json_encode($arr);
	}
	public function getCurrentNoti($userIdx){
		$this->load->model("data_model");
		$result=$this->data_model->getCurrentNoti($userIdx);
		$i=0;
		$arr=array();
		foreach ($result->result() as $data) {
			$arr[$i++]=$data;
		}
		echo json_encode($arr);
	}
	public function addUser($id, $pw){
		$this->load->model("reserve");
		$this->reserve->addUser($id, $pw);
	}
	public function addReserve($id, $date, $week, $time, $loc, $cell){
		$this->load->model("reserve");
		$this->reserve->addReserve($id, $date, $week, $time, $loc, $cell);
	}
	public function deleteReserve($id, $cell, $loc){
		$this->load->model("reserve");
		$this->reserve->deleteReserve($id, $cell, $loc);
	}
	public function getPersonal($id){
		$this->load->model("reserve");
		$query=$this->reserve->getPersonal($id);
		$result=$query->result_array();
		echo json_encode($result);
	}
	public function run(){
		//- 일단 대상이 되는 항목을 모두 가져옴
		//1. 특정 일만 하는 경우
		//2. 특정 요일만 하는 경우

		// 그래도 예약은 날짜로 확인해서 하는건데 말이지
		//그러면 week(요일)로 정기적으로 신청한 것에 대해서는 알맞는 날짜를 자동으로 구해서 해줘야하는거지...
		date_default_timezone_set('Asia/Seoul');
		$r_date=date("Ymd",strtotime("+2 day"));
		//target r_date
		$r_week=date("w",strtotime("+2 day"));
		//target r_week
		$this->load->model("reserve");
		$result_date=$this->reserve->getByDate($r_date);
		$result_week=$this->reserve->getByWeek($r_week);
		$result=array_merge($result_date,$result_week);
		//비동기
		$q = new SplQueue();

		foreach($result as $case){
			$arr=array();
			$arr['id']=$case->id;
			$arr['pw']=$case->pw;
		  // $arr['']=$case->r_reserve_id;
			$arr['loc']=$case->r_loc;
			$arr['time']=$case->r_time;
			$arr['date']=$r_date;
			// $this->curl_request_async("http://ybanana.yonsei.ac.kr/api/reserve",$arr,'GET');
			file_get_contents("http://ybanana.yonsei.ac.kr/api/reserve?".http_build_query($arr));
			$result=file_get_contents("http://ybanana.yonsei.ac.kr/api/status?".http_build_query($arr));
			$kk=json_decode($result);
			$boolResult=$kk->{'result'};
			if(!$boolResult){
				$q->enqueue(http_build_query($arr));
				echo "실패 목록에 들어감: ".http_build_query($arr);
			}else{
				echo "성공: ".http_build_query($arr);
			}
		}
		while(!($q->isEmpty())){
			$data=$q->dequeue();
			file_get_contents("http://ybanana.yonsei.ac.kr/api/reserve?".$data);
			$result=file_get_contents("http://ybanana.yonsei.ac.kr/api/status?".$data);
			$kk=json_decode($result);
			$boolResult=$kk->{'result'};
			if(!$boolResult){
				$q->enqueue($data);
				echo "실패 목록에 들어감: ".$data;
			}else{
				echo "성공: ".$data;
			}
		}


	}
	private function curl_request_async($url, $params, $type='POST')
{
    foreach ($params as $key => &$val)
    {
        if (is_array($val))
            $val = implode(',', $val);
        $post_params[] = $key.'='.urlencode($val);
    }
    $post_string = implode('&', $post_params);

    $parts=parse_url($url);

    if ($parts['scheme'] == 'http')
    {
        $fp = fsockopen($parts['host'], isset($parts['port'])?$parts['port']:80, $errno, $errstr, 30);
    }
    else if ($parts['scheme'] == 'https')
    {
        $fp = fsockopen("ssl://" . $parts['host'], isset($parts['port'])?$parts['port']:443, $errno, $errstr, 30);
    }

    // Data goes in the path for a GET request
    if('GET' == $type)
        $parts['path'] .= '?'.$post_string;

    $out = "$type ".$parts['path']." HTTP/1.1\r\n";
    $out.= "Host: ".$parts['host']."\r\n";
    $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
    $out.= "Content-Length: ".strlen($post_string)."\r\n";
    $out.= "Connection: Close\r\n\r\n";
    // Data goes in the request body for a POST request
    if ('POST' == $type && isset($post_string))
        $out.= $post_string;

    fwrite($fp, $out);
    fclose($fp);
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
