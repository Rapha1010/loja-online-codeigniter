<?php

Class Produtos_model extends CI_Model {

	public function buscaTodos() {
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

}