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
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a�ao
        redirect("condicoes/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Condições ",
            "view" => "condicoes/listar",
            "data" => Array(
                "condicoes" => $this->condicao->pegarPorLimite(registerPage(),page()),
                 "paginacao" => createPaginate(strtolower(get_class()), $this->condicao->quantidade())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $condicao = elements(Array("nome", "parcelas", "dias"), $this->input->post());
            if ($this->condicao->adicionar($condicao)) {
                $this->mensagem->sucesso("condicoes/adicionar");
            } else {
                $this->mensagem->erro("condicoes/listar");
            }
        }
        $data = Array(
            "title" => "Adicionar Condiçoes",
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
            redirect('condicoes/listar');
        }
        if ($this->input->post()) {
            $condicao = elements(array("nome", "parcelas", "dias"), $this->input->post());
            if ($this->condicao->editarPeloId($id, $condicao)) {
                $this->mensagem->sucesso("condicoes/listar");
            } else {
                $this->mensagem->erro("condicoes/editar/.$id");
            }
        }
        $data = Array(
            "title" => "Editar Condições",
            "view" => "condicoes/editar",
            "data" => Array(
               
                "condicao" => $this->condicao->listarTodos(),
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
            redirect("condicao/listar");
        }
        if ($this->condicao->deletarPeloId($id)) {
            $this->mensagem->sucesso("condicoes/listar");
        } else {
            $this->mensagem->erro("condicoes/listar");
        }
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ M�todos especificos
     */

    /**
     * @description M�todo que realiza as valida��es dos campos
     * 
     * @param Array $dados
     * @return boolean
     */
    public function validacao($dados) {
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */