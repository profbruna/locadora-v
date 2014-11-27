<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Cliente
 * 
 * @author Amanda Croce, Victor Luz
 * @package application.models
 */
class RelatorioABC extends App {

    protected $table = "produto_locacao";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    
    public function pegarPorLimiteData( $dataInicio, $dataFim) {
        if (isset($dataInicio, $dataFim)) {
            $this->db->select('p.produto_id as id, pp.nome, sum(p.quantidade) as qtd');
            $this->db->where("l.data >=", $dataInicio);
            $this->db->where("l.data <=", $dataFim);
            $this->db->join("produto_locacao p", ' p.locacao_id = l.id');
            $this->db->join("produto pp", ' pp.id = p.produto_id');
            $this->db->group_by('p.produto_id, pp.nome');
            $this->db->order_by('sum(p.quantidade) desc');
            return $this->db->get('locacao l')->result(); 
           
        }
        return false;
    }
    
}
