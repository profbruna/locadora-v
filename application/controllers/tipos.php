<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Tipos
 * 
 * @author Ramon Sasse e Gianfrancesco
 * @package application.controllers
 */
class Tipos extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("tipo"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("tipos/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Tipos ",
            "view" => "tipos/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->tipo->quantidade()),
                "tipos" => $this->tipo->pegarPorLimite(registerPage(), page())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $tipo = elements(Array("descricao"), $this->input->post());
            if ($this->validacao()) {
                if ($this->tipo->adicionar($tipo)) {
                    $this->mensagem->sucesso("tipos/adicionar");
                } else {
                    $this->mensagem->erro("tipos/listar");
                }
            }else{
                $this->mensagem->erro("tipos/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar tipos",
            "view" => "tipos/adicionar",
            "data" => Array(
                "tipos" => $this->tipo->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->tipo->existe($id)) {
            redirect("tipos/listar");
        }
        if ($this->input->post()) {
            
            $tipo = elements(Array("descricao"), $this->input->post());
            if ($this->validacao()) {
            if ($this->tipo->editarPeloid($id, $tipo)) {
                $this->mensagem->sucesso("tipos/listar");
            } else {
                $this->mensagem->erro("tipos/editar/" . $id);
            }
            }else{
               $this->mensagem->erro("tipos/editar/" . $id);
            }
        }
        $data = Array(
            "title" => "Editar Descricao",
            "view" => "tipos/editar",
            "data" => Array(
                "tipos" => $this->tipo->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->tipo->existe($id)) {
            redirect("tipos/listar");
        }
        if ($this->tipo->deletarPeloId($id)) {
            $this->mensagem->sucesso("tipos/listar");
        } else {
            $this->mensagem->erro("tipos/listar");
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
    public function validacao() {
        $this->form_validation->set_rules("descricao", "Descricao", "required");

        //executa valida��o
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
