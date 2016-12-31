<?php

Class Produtos_model extends CI_Model {

	public function buscaTodos() {

		$this->db->where(array('vendido'=>0));
		return $this->db->get("produto")->result_array();
	}

	public function salvar($produto) {
		$this->db->insert("produto",$produto);
	}

	public function busca($id) {

		$produto = $this->db->get_where("produto",array(
			"id"=>$id))->row_array();

		return $produto;
	}

	public function buscaVendidos($usuario) {

		$id = $usuario["id"];
		$this->db->select("produto.*, vendas.data_de_entrega");
		$this->db->from("produto");
		$this->db->join("vendas", "vendas.produto_id = produto.id");
		$this->db->where("vendido", true);
		$this->db->where("usuario_id", $id);
		return $this->db->get()->result_array();
	}

}