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

	}

	public function mostra($id) {
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$this->load->helper("typography");
		$dados = array("produto"=>$produto);


		$this->load->view('produtos/mostra',$dados);
	}

}