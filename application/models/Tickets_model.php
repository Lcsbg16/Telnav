<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets_model extends CI_Model {

	public function cadastrar()
	{
		$config['upload_path']  = './uploads/';
		$config['allowed_types']= 'jpg|png|pdf|doc|docx';
		$config['max_size']     = 2048;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('files'))
		{
			$data = array(
				'descricao' => $this->input->post('descricao'),
				'files' => $this->upload->data('file_name')
			);
            $data['status'] = "aberto";

            #$data['usuario'] = $usuario_id;

			$this->db->insert('tickets', $data);
		}
		else
		{
			echo $this->upload->display_errors();
		}
	}

}