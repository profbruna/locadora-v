<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Clientes
 * 
 * @author Amanda Croce, Victor Luz
 * @package application.controllers
 */
class Clientes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("cliente"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("clientes/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Clientes ",
            "view" => "clientes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower (get_class()), $this->cliente->quantidade()),
                "clientes" => $this->cliente->pegarPorLimite(registerPage(), page())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $cliente = elements(Array("nome", "cpf", "rg", "email"), $this->input->post());
            if($this->validacao()){
                if ($this->cliente->adicionar($cliente)) {
                $this->mensagem->sucesso("clientes/adicionar");
            } else {
                $this->mensagem->erro("clientes/listar");
            }
        }else{
            $this->mensagem->sucesso("clientes/adicionar");
        }
        }
        $data = Array(
            "title" => "Adicionar Clientes",
            "view" => "clientes/adicionar",
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
        if (!$this->cliente->existe($id)) {
            redirect("clientes/listar");
        }
        
        if ($this->input->post()) {
            $cliente = elements(Array("nome", "cpf", "rg", "email"), $this->input->post());
            
            if($this->validacao()){
                if ($this->cliente->editarPeloId($id, $cliente)) {
                $this->mensagem->sucesso("clientes/listar");
            } else {
                $this->mensagem->erro("clientes/editar/".$id);
            }
            }   
        }
        $data = Array(
            "title" => "Editar Clientes",
            "view" => "clientes/editar",
            "data" => Array(
                 "cliente" => $this->cliente->listarPorId($id)
            )
        );
            $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->cliente->existe($id)) {
            redirect("clientes/listar");
        }
        if ($this->cliente->deletarPeloId($id)) {
            $this->mensagem->sucesso("clientes/listar");
        } else {
            $this->mensagem->erro("clientes/listar");
        }
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ M?todos especificos
     */

    /**
     * @description M?todo que realiza as valida??es dos campos
     * 
     * @param Array $dados
     * @return boolean
     */
    public function validacao($dados) {
        $this->form_validation->set_rules("nome", 'Nome', 'required');
        $this->form_validation->set_rules("cpf", 'CPF', 'required');
        $this->form_validation->set_rules("rg", 'RG', 'required');
        $this->form_validation->set_rules("email", 'Email', 'required');
        
        //executar validações
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */