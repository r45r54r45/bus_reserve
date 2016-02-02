<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function help()
	{
		require_once(APPPATH.'libraries/coolsms.php');
		$api_key = 'NCS53C2A831865B7';
		$api_secret = 'BEF1FE1C24C72F28C488728F91A2C838';

		$rest = new coolsms($api_key, $api_secret);

		$options->type = "SMS";
		$options->to = "01071097327";
		$options->from = "01071097327";
		$options->text = $_GET['data'];
		$rest->send($options);
	}
	public function food()
	{
		$this->load->model("data_model");
		$result=$this->data_model->food_get("2016-02-29");
		$r= $result->result();
		echo $r[0][0];
		echo $r[0][1];
		echo $r[0][2];
		$f1=array("","");
		$f2=array("뚝)뼈없는감자탕
[돈육:미국산,돈잡뼈:국
내산]
쌀밥
새우완자전
진미채무침
깍두기","");
		$f3=array("새우튀김우동
김가루양념밥
순대찜
단무지
배추김치","");
		$one=array($f1,$f2,$f3);
		$two=array($f1,$f2,$f3);
		$arr = array ($one,$two);
		echo json_encode($arr);
	}
	public function food_add()
	{
		$this->load->model("data_model");
		$this->data_model->food_add($_POST['date'],$_POST['data1'],$_POST['data2']);

	}

}
