<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function index()
	{
        $usuario_id = $this->session->userdata('usuario_id',$id);
		$this->load->model('Tickets_model');
		$this->load->view('Dashboard/index');
	}

	public function cadastrar()
	{
		$this->load->model('Tickets_model');
		$this->Tickets_model->cadastrar();
		$this->load->view('Dashboard/listagem');
	}

	public function listar(){

	}

}