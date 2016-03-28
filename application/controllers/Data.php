<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function help()
	{
		// require_once(APPPATH.'libraries/coolsms.php');
		// $api_key = 'NCS53C2A831865B7';
		// $api_secret = 'BEF1FE1C24C72F28C488728F91A2C838';
		//
		// $rest = new coolsms($api_key, $api_secret);
		//
		// $options->type = "LMS";
		// $options->to = "01071097327";
		// $options->from = "01071097327";
		// $options->text = $_GET['data'];
		// $rest->send($options);
		mail("r54r45r54@gmail.com","문의 제보",$_GET['data']);
		mail("jaehadlee@naver.com","문의 제보",$_GET['data']);
	}
	public function auto_login_add($user){


		$arr=array();
		$this->load->model("data_model");
		$result=$this->data_model->auto_login_verify($user);

		if($result->num_rows()==0){
			$result=$this->data_model->auto_login_add($user,$code);
		}else{
			$result=$this->data_model->auto_login_delete($user);
			$result=$this->data_model->auto_login_add($user,$code);
		}

		$arr['code']= "";
		echo json_encode($arr);
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
	public function gorilla_login($id, $pw, $final_userIdx){
		$this->load->model("data_model");
		$result=$this->data_model->gorilla_login($id, $pw, $final_userIdx);
		$arr=array();
		if($result->num_rows()==1){
			$arr['result']=true;
		}else{
			$arr['result']=false;
		}
		echo json_encode($arr);
	}
	public function gorilla_join($id, $pw, $final_userIdx, $gorilla_pw){
		$this->load->model("data_model");
		if("g".$id[0].$id[2].$id[4].$id[6].$id[8]==$gorilla_pw){
			$result=$this->data_model->gorilla_join($id, $pw, $final_userIdx);
		}else{
			$arr=array();
			$arr['result']=false;
			echo json_encode($arr);
		}
	}
	public function normal_join($id, $pw, $final_userIdx){
		$this->load->model("data_model");
		$result=$this->data_model->normal_join($id, $pw, $final_userIdx);
	}
	public function get_auth($final_userIdx){
		$this->load->model("data_model");
		$result=$this->data_model->get_auth($final_userIdx);
		$re=$result->result_array();
		$auth['auth']=$re[0]['auth'];
		echo json_encode($auth);
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
	public function addBanana($id, $num){
		$this->load->model("data_model");
		$result=$this->data_model->addBanana($id, $num);
		$row=$result->result_array();
		$arr=array();
		$kkk=$row[0];
		$arr['current']=$kkk['banana'];
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
		sleep(53);
		$str="";
		$str.= "start run\n";

		date_default_timezone_set('Asia/Seoul');
		$str.= date("D M j G:i:s T Y");
		$str.= "\n";

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
		$failCount=array();
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
				$failCount[http_build_query($arr)]=1;
				$str.= "실패 목록에 들어감: ".http_build_query($arr)."\n";
			}else{
				$str.= "성공: ".http_build_query($arr)."\n";
			}
		}
		while(!($q->isEmpty())){
			$data=$q->dequeue();
			file_get_contents("http://ybanana.yonsei.ac.kr/api/reserve?".$data);
			$result=file_get_contents("http://ybanana.yonsei.ac.kr/api/status?".$data);
			$kk=json_decode($result);
			$boolResult=$kk->{'result'};
			if(!$boolResult){
				$failCount[$data]++;
				if($failCount)
				$q->enqueue($data);
				$str.= $failCount[$data]."번째 실패 목록에 들어감: ".$data."\n";
			}else{
				$str.= $failCount[$data]."번 시도 후 성공: ".$data."\n";
			}
		}
		echo $str;
		mail ( "r54r45r54@gmail.com" , "오늘의 예약 결과" , $str );

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
	public function food($day)
	{
		$a; $b;
		$this->load->model("data_model");
		$day_temp  = mktime (0,0,0,date("m") , date("d")+$day, date("Y"));
		$day_target= date("Y-m-d",$day_temp);
		$result=$this->data_model->food_get($day_target);
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
	public function busTime(){

		$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000725&routeid=165000381&pathseq=30");
		$time=strrpos($content,'<font color="red">');
		$pos= stripos($content,'<font color="red">');
		$b6724=array("","");
		if(!$pos||!$time){

		}
		else{
		$b6724[0]=substr($content,$pos+18,1);
		$b6724[1]=substr($content,$time+18,2);
		}
		//end of 6724

		$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000861&routeid=165000245&pathseq=33");
		$time=strrpos($content,'<font color="red">');
		$pos= stripos($content,'<font color="red">');
		$b9201=array("","");
		if(!$pos||!$time){}
		else{
		$b9201[0]=substr($content,$pos+18,1);
		$b9201[1]=substr($content,$time+18,2);
		}
		//end of 9201


		$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000848&routeid=165000206&pathseq=74");
		$time=strrpos($content,'<font color="red">');
		$pos= stripos($content,'<font color="red">');
		$b91=array("","");
		if(!$pos||!$time){}
		else{
		$b91[0]=substr($content,$pos+18,2);
		$b91[1]=substr($content,$time+18,2);
		}
		//end of 91

		$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000725&routeid=165000206&pathseq=61");
		$time=strrpos($content,'<font color="red">');
		$pos= stripos($content,'<font color="red">');
		$b912=array("","");
		if(!$pos||!$time){}
		else{
		$b912[0]=substr($content,$pos+18,2);
		$b912[1]=substr($content,$time+18,2);
		}
		//end of 912

		$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=164000016&routeid=165000215&pathseq=41");
		$time=strrpos($content,'<font color="red">');
		$pos= stripos($content,'<font color="red">');
		$b6405=array("","");
		if(!$pos||!$time){}
		else{
		$b6405[0]=substr($content,$pos+18,1);
		$b6405[1]=substr($content,$time+18,2);
		}
		//end of 6405

		echo '{
		  "6724":{"count":"'.$b6724[0].'","time":"'.$b6724[1].'"},
		  "6405":{"count":"'.$b6405[0].'","time":"'.$b6405[1].'"},
		  "91":{"count":"'.$b91[0].'","time":"'.$b91[1].'"},
			"912":{"count":"'.$b912[0].'","time":"'.$b912[1].'"},
		  "9201":{"count":"'.$b9201[0].'","time":"'.$b9201[1].'"}
		}';
	}
}
