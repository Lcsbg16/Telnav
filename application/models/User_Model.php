<?php

class User_Model extends CI_Model{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register_user(){

        $senha=$this->input->post('senha');
        $conf_senha=$this->input->post('conf_senha');
       

        if($senha!=$conf_senha){
            $this->session->set_flashdata('worng','As senhas estão diferentes!!');
            redirect('User/register');
        }else{
            $data=array(
                "nome"=>$this->input->post('nome'),
                "email"=>$this->input->post('email'),
                "senha"=>$senha
            );
            $data['isAdmin'] = false;
            $this->db->insert('users',$data);
            $this->session->set_flashdata('suc','Voce esta cadastrado, por favor realize o login!');
            redirect('User/');

        }
    }
    
    public function getUser($id)
    {
        $resultado = $this->db->where('id', $id)
                              ->get('users');
        return $resultado->row_array();                      
    }


    public function login_user(){
        $email=$this->input->post('email');
        $senha=$this->input->post('senha');

        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        $query=$this->db->get('users');
        $find_user=$query->num_rows($query);

        if($find_user>0){
            $usuario = $this->getUser($id);
            $this->session->set_userdata('usuario',$usuario_id);
            $this->session->set_flashdata('suc','Login confirmado');
            redirect('User/main');
        }else{
            $this->session->set_flashdata('warning','Falha na identificação, Email ou senha incorretos!!!');
            redirect('/');
        }
    }

}

?>
