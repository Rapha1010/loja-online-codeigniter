<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login Extends CI_Controller {

	public function autenticar() {

		$this->load->model("usuarios_model");
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));
		$usuario = $this->usuarios_model->buscaPorEmailESenha($email,$senha);

		if($usuario) {
			$this->session->set_userdata(array("usuario_logado"=>$usuario));
			$this->session->set_flashdata("success","Logado com sucesso");
		} else {

			$this->session->set_flashdata("danger","Usuário não logado");
		}

		redirect('/');

	}

	public function logout() {
		$this->session->set_flashdata("success","Usuário deslogado com sucesso");
		$this->session->unset_userdata("usuario_logado");
		redirect('/');
		
	}
}



?>