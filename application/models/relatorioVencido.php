<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Relat�rio Vencido
 * 
 * @author Camila Jung e Ruan C�lio
 * @package application.models
 */
class RelatorioVencido extends App {

    protected $table = "financeiro";

    function listarNomes() {
        $hoje = Date("Y-m-d");
        $dados = $this->db->query("SELECT cliente.nome, financeiro.id, financeiro.locacao_id, financeiro.vencimento, financeiro.valor, financeiro.valor_pago FROM financeiro , locacao, cliente WHERE financeiro.locacao_id = locacao.id AND locacao.cliente_id = cliente.id AND financeiro.vencimento < '" . $hoje . "'")->result();
        return $dados;
    }

}
