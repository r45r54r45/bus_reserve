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
		if(!isset($_SESSION['id']))redirect("http://freshman.yonsei.ac.kr/prints/";
		$this->load->view('header');
		$this->load->view('print_vault');
		$this->load->view('footer');
	}
	public function login_func()
	{
		$this->load->helper('url');
		$user=$this->input->post("id");
		// 로그인 성공하면
		$_SESSION['id']=$user;
		// freshman.yonsei.ac.kr
		redirect("http://freshman.yonsei.ac.kr/prints/vault");
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
	public function vault_refresh(){
		$id=$_GET['id'];
		$query = "select * from upload_file where user ='$id'";
		$result=$this->db->query($query);
		$cnt=0;
		$f_name;
		$f_idx;
		foreach ($result->result() as $row)
		{
			$cnt++;
			$f_name=$row->name;
			$f_idx=$row->idx;
			echo '
			<tr>
				<td>'.$f_name.'</td>
				<td><a href="prints/download/'.$f_idx.'"><span class="glyphicon glyphicon-download"></span></a></td>
			</tr>
			';
		}
		if($cnt==0)
		echo '
		<tr>
			<td colspan="2">파일함이 비어있습니다.</td>
		</tr>
		';


	}
}