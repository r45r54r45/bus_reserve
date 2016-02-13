<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function register()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		$this->load->model("app_model");
		// $this->app_model->regit($obj->{"regId"});
		$this->app_model->regit($_GET["regId"]);
	}
	public function gcmSender(){
		$this->load->model("app_model");
		$regits=$this->app_model->getRegits();
		$result=array();
		foreach ($regits->result_array() as $row) {
			echo $row;
			array_push($result,trim($row[0]));
		}

		$headers = array(
		 'Content-Type:application/json',
		 'Authorization:key=AIzaSyACU6iZvyBcFURa6w_BYRIqVzxqdP8_sos'
		);

		$arr   = array();
		$arr['data'] = array();
		$arr['data']['data']="fuck fuck";
		$arr['data']['type']="text";
		$arr['data']['command']="show";
		$arr['registration_ids'] = array();
		$arr['registration_ids'] = $result;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,    'https://android.googleapis.com/gcm/send');
		curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
		curl_setopt($ch, CURLOPT_POST,    true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arr));
		$response = curl_exec($ch);
		echo $response;
		curl_close($ch);
	}
}
