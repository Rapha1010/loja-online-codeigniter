<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Produtos extends CI_Controller {

	public function index() 
	{
		$this->load->database();
		$this->load->model("produtos_model");
		$produtos = $this->produtos_model->buscaTodos();

		$dados = array("produtos"=>$produtos);
		$this->load->helper(array("currency"));
		$this->load->view("produtos/index.php",$dados);
	}

	public function formulario() {
		$this->load->view("produtos/formulario");
	}

	public function novo() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome","nome","trim|required|min_length[5]");
		$this->form_validation->set_rules("descricao","descricao","trim|required|min_length[10]");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");

		$sucesso = $this->form_validation->run();
		if($sucesso) {
			$usuariologado = $this->session->userdata("usuario_logado");
			$produto = array(
				"nome"=>$this->input->post("nome"),
				"descricao"=>$this->input->post("descricao"),
				"preco"=>$this->input->post("preco"),
				"usuario_id"=>$usuariologado["id"]);

			$this->load->model("produtos_model");
			$this->produtos_model->salvar($produto);
			$this->session->set_flashdata("success","Produto Salvo com sucesso.");
			redirect("/");
		} else {

			$this->load->view('produtos/formulario');

		}

	}

	public function mostra($id) {
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$this->load->helper("typography");
		$dados = array("produto"=>$produto);


		$this->load->view('produtos/mostra',$dados);
	}


	public function nao_tem_a_palavra_melhor($nome){
		$posicao = strpos($nome,"melhor");

		// 	$this->form_validation->set_message("nao_tenha_a_palavra_melhor","o campo '%s' não pode conter a palavra melhor");
		// if($posicao){
		// 	return true;

		// } else {
		// 	return false;
		// }


	}

}