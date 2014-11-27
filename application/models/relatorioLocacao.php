<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class relatorioLocacao extends App {

    protected $table = "produto_locacao";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }


    public function pegarPorLimiteData( $data_inicial, $data_final) {
        if (isset($data_inicial, $data_final)) {
            $this->db->where("data_devolucao >=", $data_inicial);
            $this->db->where("data_devolucao <=", $data_final);
            return $this->db->get($this->table)->result();
        }
        return false;
    }

}
