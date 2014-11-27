<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Relatório de Aniversáriantes
 * 
 * @author Gianfrancesco e Ramon
 * @package application.models
 */
class RelatorioAniversariante extends App {

    protected $table = "cliente";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * @description Listar um registro segundo as datas informadas
     * 
     * @param $data_inicial, $data_final
     * @return array : boolean
     */
 
    public function pegarPorLimiteData($dia_ini, $dia_fim, $mes_ini, $mes_fim) {
        if (isset($dia_ini, $dia_fim, $mes_ini, $mes_fim)) {
            $this->db->where("day(nascimento) >=", $dia_ini);
            $this->db->where("day(nascimento) <=", $dia_fim);
            $this->db->where("month(nascimento) >=", $mes_ini);
            $this->db->where("month(nascimento) <=", $mes_fim);
            $this->db->order_by("nascimento", "asc");
            
            return $this->db->get($this->table)->result();
        }
        return false;
    }

}
