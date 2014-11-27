<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Cidades
 * 
 * @author Rodrigo Cachoeira
 * @package application.controllers
 */
class Financeiros extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("financeiro"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a aï¿½ao
        redirect("financeiros/listar");
    }

    /**
     * listar
     */
    public function listar() {

        $data = Array(
            "title" => " Listar Lançamentos Financeiro",
            "view" => "financeiros/listar",
            "data" => Array(
                "financeiros" => $this->financeiro->pegarPorLimite(registerPage(), page()),
                "paginacao" => createPaginate(strtolower(get_class()), $this->financeiro->quantidade())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar($LocacaoId = 1) {
        /// SEU CÃDIGO RODRIGO
        $this->load->model(Array("locacao"));
        $Dados = $this->locacao->ListarPorId($LocacaoId);
        /// SEU CÃDIGO RODRIGO

        $this->load->model(Array("condicao"));
        $DadosCondicao = $this->condicao->ListarPorId($Dados[0]->condicao_pagamento_id);

        $date = new DateTime($Dados[0]->data);
        $date->add(new DateInterval("P{$DadosCondicao[0]->dias}D"));
        $LocacaoVencimento = $date->format('Y-m-d');
        $LocacaoValor = $Dados[0]->valor;

        $financeiro = array("locacao_id" => $LocacaoId, "vencimento" => $LocacaoVencimento, "valor" => $LocacaoValor);
        if ($this->financeiro->adicionar($financeiro)) {
            $this->mensagem->sucesso("financeiros/listar");
        } else {
            $this->mensagem->erro("financeiros/listar");
        }
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->financeiro->existe($id)) {
            redirect('financeiros/listar');
        }
        if ($this->input->post()) {
            $financeiro = array("vencimento" => implode('-', array_reverse(explode('/', $this->input->post("vencimento")))), "valor" => $this->input->post("valor"));
            if ($this->validacao()) {

                if ($this->financeiro->editarPeloId($id, $financeiro)) {
                    $this->mensagem->sucesso("financeiros/listar");
                } else {
                    $this->mensagem->erro("financeiros/editar/$id");
                }
            } else {
                $this->mensagem->erro("financeiros/editar/" . $id);
            }
        }
        $data = Array(
            "title" => "Editar Lançamento Financeiro",
            "view" => "financeiros/editar",
            "data" => Array(
                "financeiro" => $this->financeiro->ListarPorId($id),
            )
        );
        $this->load->view("layouts/default", $data);
    }

    public function baixa() {
        $id = $this->uri->segment(3);
        if (!$this->financeiro->existe($id)) {
            redirect('financeiros/listar');
        }
        if ($this->input->post()) {
            $financeiro = elements(array("valor_pago"), $this->input->post());
            if ($this->validacao(true)) {
                if ($this->financeiro->editarPeloId($id, $financeiro)) {
                    $this->mensagem->sucesso("financeiros/listar");
                } else {
                    $this->mensagem->erro("financeiros/baixa/$id");
                }
            } else {
                $this->mensagem->erro("financeiros/baixa/" . $id);
            }
        }
        $data = Array(
            "title" => "Baixa Lançamento Financeiro",
            "view" => "financeiros/baixa",
            "data" => Array(
                "financeiro" => $this->financeiro->ListarPorId($id),
            )
        );
        if (!empty($data["data"]["financeiro"][0]->valor_pago)) {
            redirect('financeiros/listar');
        }
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->financeiro->existe($id)) {
            redirect("financeiro/listar");
        }
        if ($this->financeiro->deletarPeloId($id)) {
            $this->mensagem->sucesso("financeiros/listar");
        } else {
            $this->mensagem->erro("financeiros/listar");
        }
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ Mï¿½todos especificos
     */

    /**
     * @description Mï¿½todo que realiza as validaï¿½ï¿½es dos campos
     * 
     * @param Array $dados
     * @return boolean
     */
    public function validacao($Baixa = false) {
        if ($Baixa === false) {
            $this->form_validation->set_rules("vencimento", 'Vencimento', 'required');
            $this->form_validation->set_rules("valor", 'Valor', 'required');
        } else {
            $this->form_validation->set_rules("valor_pago", 'Valor Pago', 'required');
        }

        //executar validações
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */