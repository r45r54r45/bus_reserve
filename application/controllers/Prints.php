<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('print_main');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('header');
		$this->load->view('print_login');
		$this->load->view('footer');
	}
	public function vault()
	{
		$this->load->view('header');
		$this->load->view('print_vault');
		$this->load->view('footer');
	}
	public function login_func()
	{
		$this->load->helper('url');
		$this->input->post("id");
		// 로그인 성공하면
		$user="r45r54r45";
		// freshman.yonsei.ac.kr
		redirect("http://freshman.yonsei.ac.kr/prints/vault?user=".$user);
	}
	public function file()
	{
		$this->load->database();

		if(isset($_FILES['userfile']['size']))
		{
			$fileName = $_FILES['userfile']['name'];
			$tmpName  = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);

			if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
			}

			 $query = "insert into upload_file (user,name, size, type, content ) VALUES ('1','$fileName', '$fileSize', '$fileType', '$content')";
			 $this->db->query($query) or die('Error, query failed');

			echo "<br>File $fileName uploaded<br>";
		}

	}
}
