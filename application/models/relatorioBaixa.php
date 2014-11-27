<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Cidade
 * 
 * @author Nikolas Schafer e Dã Prada
 * @package application.models
 */
class RelatorioBaixa extends App {

    protected $table = "baixa";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * @description Listar um registro segundo as datas informadas
     * 
     * @param $data_inicial, $data_final, $limite, $inicio
     * @return array : boolean
     */

    public function pegarPorLimiteData($data_inicial, $data_final) {
        if (isset($data_inicial, $data_final)) {
            $this->db->where("data >=", $data_inicial);
            $this->db->where("data <=", $data_final);
            $this->db->order_by("data", "asc");
            return $this->db->get($this->table)->result();
        }
        return false;
    }

}
