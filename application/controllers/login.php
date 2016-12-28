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
			$dados = array ("mensagem"=>"logado com sucesso.");

		} else {

			$dados = array("mensagem"=>"Usuário ou senha inválida.");

		}

		redirect('/');

	}

	public function logout() {
		$this->session->unset_userdata("usuario_logado");
		$this->load->view("login/logout");
	}
}



?>