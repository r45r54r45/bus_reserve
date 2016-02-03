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
		$a; $b;
		$this->load->model("data_model");
		$result=$this->data_model->food_get("2016-02-29");
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
