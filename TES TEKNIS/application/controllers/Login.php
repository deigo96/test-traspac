<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$password = hash('md5', $password);

		$login = $this->M_admin->auth($email, $password);

		if(count($login) == 1){
			$data = array(
				"id" => $login->id,
				"nama" => $login->nama,
				"email" => $login->email
			);

			$this->session->set_userdata($data);

			if($this->session->userdata('id')) {
				echo "true";
			}
		}
		else {
			echo "false";
		}

		// echo json_encode($login);
	}

	public function checkEmail()
	{
		$email = $this->input->post('email');
		$checkEmail = $this->M_admin->checkEmail($email) == 0 ? "false" : "true";

		echo $checkEmail;
	}

	public function checkPassword()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = hash('md5', $password);
		$checkPassword = $this->M_admin->checkPassword($password, $email) == 0 ? "false" : "true";

		echo $checkPassword;
	}
}
