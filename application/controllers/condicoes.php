<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Condicoes
 * 
 * @author Álvaro Pietro e Luis Fernando
 * @package application.controllers
 */
class Condicoes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("condicao"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a açao
        redirect("condicoes/listar");
    }

    /**
     * listar
     */
    //
    //echo $this->pagination->create_links()
    public function listar() {
        $data = Array(
            "title" => " Listar Condições de Pagamento ",
            "view" => "condicoes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->condicao->quantidade()),
                "condicoes" => $this->condicao->pegarPorLimite(registerPage(), page())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {

            $dados = elements(Array("nome", "parcelas", "dias"), $this->input->post());
            if ($this->validacao()) {
                if ($this->condicao->adicionar($dados)) {
                    $this->mensagem->sucesso("condicoes/listar");
                } else {
                    $this->mensagem->erro("condicoes/adicionar");
                }
            } else {
                $this->mensagem->erro("condicoes/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar Condição de Pagamento",
            "view" => "condicoes/adicionar",
            "data" => Array(
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->condicao->existe($id)) {
            redirect("condicoes/listar");
        }
        if ($this->input->post()) {
            $condicao = elements(Array("nome", "parcelas", "dias"), $this->input->post());
            if ($this->validacao()) {
                if ($this->condicao->editarPeloId($id, $condicao)) {
                    $this->mensagem->sucesso("condicoes/listar");
                } else {
                    $this->mensagem->erro("condicoes/editar/" . $id);
                }
            } else {
                $this->mensagem->erro("condicoes/editar/" . $id);
            }
        }
        $data = Array(
            "title" => "Editar Condição de Pagamento",
            "view" => "condicoes/editar",
            "data" => Array(
                "condicao" => $this->condicao->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->condicao->existe($id)) {
            redirect("condicoes/listar");
        }
        $this->load->model(Array("locacao"));
        $ExisteLocacao = ($this->locacao->listarPorCondicoes(array("condicao_pagamento_id" => $id)));
        if (count($ExisteLocacao)>0) {
            $this->mensagem->erro("condicoes/listar");
        }else{
        if ($this->condicao->deletarPeloId($id)) {
            $this->mensagem->sucesso("condicoes/listar");
        } else {
            $this->mensagem->erro("condicoes/listar");
        }
        }
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ Métodos especificos
     */

    /**
     * @description Método que realiza as validações dos campos
     * 
     * @param Array $dados
     * @return boolean
     */
    public function validacao() {
        $this->form_validation->set_rules("nome", 'Nome', 'required');
        $this->form_validation->set_rules("parcelas", 'Parcelas', 'required');
        $this->form_validation->set_rules("dias", 'Dias', 'required');


        //executar validações
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */