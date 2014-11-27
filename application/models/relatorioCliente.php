<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class relatorioCliente extends App {

    protected $table = "cliente";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    public function pegarPorLimiteData($data_inicial, $data_final) {
        if (isset($data_inicial, $data_final)) {
            //$this->db->where("data >=", $data_inicial);
            //$this->db->where("data <=", $data_final);
            $Query = $this->db->query("select * from cliente where id not in (select cliente_id from locacao where data between '$data_inicial' and '$data_final' )");

            return $Query->result();
        }
        return false;
    }

}
