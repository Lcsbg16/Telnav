<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('User/login');
	}

	public function register(){
		$this->load->view('User/register');
	}

	public function registrar_form(){
		$this->User_Model->register_user();
	}

	public function login_form(){
		$this->User_Model->login_user();

		$variaveis_view = [];

		$id = $this->input->get('id');
		if($id)
		{
			$user = $this->User_Model->getUser($id);
			$variaveis_view['user'] = $user;
		}
		$this->load->view('Dashboard/listagem', $variaveis_view);
	}

	public function main(){
		$this->load->view('Dashboard/index');
	}
}
