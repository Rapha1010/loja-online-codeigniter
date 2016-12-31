<?php

class Vendas extends CI_Controller {

	public function index() {
		autoriza();
		$usuario = $this->session->userdata("usuario_logado");
		$this->load->model("produtos_model");
		$produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
		$dados = array("produtosVendidos"=>$produtosVendidos);
		$this->load->template("vendas/index", $dados);
	}

	public function nova() {
		autoriza();

		$this->load->helper(array('date'));
		$usuario = $this->session->userdata("usuario_logado");
		$this->load->model(array("vendas_model","usuarios_model","produtos_model"));

		$vendas = array(
			"produto_id"=>$this->input->post("produto_id"),
			"comprador_id"=>$usuario["id"],
			"data_de_entrega"=>dataPtBrParaMysql($this->input->post("data_de_entrega"))
		);

		$this->load->library("email");
		$config["protocol"] ="smtp";
		$config["smtp_host"] ="ssl://smtp.gmail.com";
		$config["smtp_user"] = "@gmail.com";
		$config["smtp_pass"] = "";
		$config["charset"] = "utf-8";
		$config["mailtype"] = "html";
		$config["newline"] = "/r/n";
		$config["smtp_port"] = "456";
		$this->email->initialize($config);

		$produto = $this->produtos_model->busca($vendas['produto_id']);
		$vendedor = $this->usuarios_model->busca($produto['usuario_id']);

		$dados = array("produto" =>$produto);
		$conteudo = $this->load->view("vendas/email",$dados, true;


		$this->email->from("@gmail.com", "Mercado");
		$this->email->to($vendedor["email"]);
		$this->email->subject("Seu produto {$vendas['nome']} foi vendido");
		$this->email->message($conteudo);
		//$this->email->send();

		$this->load->template("vendas/email");

		$this->vendas_model->salva($vendas);
		$this->session->set_flashdata("success","Pedido de compra efetuado!");
		redirect("/");
	}
}