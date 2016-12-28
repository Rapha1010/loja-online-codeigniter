<?php

Class Produtos_model extends CI_Model {

	public function buscaTodos() {
		return $this->db->get("produto")->result_array();

	}

}