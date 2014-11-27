<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: relatorioValor
 * 
 * @author Yuri Alc�ntara
 * @package application.models
 */
class RelatorioValor extends App {

    protected $table = "financeiro";
    
    public function listarPorData($diaIni, $diaFin) {
        
        $this->db->select('id, locacao_id, vencimento, valor, valor - valor_pago as saldo');
        $this->db->where('vencimento >=', $diaIni);
        $this->db->where('vencimento <=', $diaFin);
        $this->db->where('valor > valor_pago');
        
        
        return $this->db->get('financeiro')->result();
    }

}
