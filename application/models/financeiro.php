<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Condicao
 * 
 * @author Álvaro e Luis Fernando
 * @package application.models
 */
class Financeiro extends App {

    protected $table = "financeiro";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    public function adicionar($LocacaoId = 1) {

        if (empty($LocacaoId)) {
            return false;
        }
        $this->load->model(Array("locacao"));
        $Dados = $this->locacao->listarPorId($LocacaoId);
        if (empty($Dados)) {
            return false;
        }

        $this->load->model(Array("condicao"));
        $DadosCondicao = $this->condicao->listarPorId($Dados[0]->condicao_pagamento_id);

        $date = new DateTime($Dados[0]->data);
        $date->add(new DateInterval("P{$DadosCondicao[0]->dias}D"));
        $LocacaoVencimento = $date->format('Y-m-d');
        $LocacaoValor = $Dados[0]->valor;
        //Verifica se já existe um lnaçamento para esta locação
        $DadosLancamento = $this->listarPorCondicoes(array("locacao_id" => $LocacaoId));

        $financeiro = array("vencimento" => $LocacaoVencimento, "valor" => $LocacaoValor);
        if (empty($DadosLancamento)) {
            $financeiro["locacao_id"] = $LocacaoId;
            $acao = $this->adicionar($financeiro);
        } else {

            $acao = $this->editarPeloId($DadosLancamento[0]->id, $financeiro);
        }

        if ($acao) {
        
            return true;
        } else {
            return false;
        }
    }

}
