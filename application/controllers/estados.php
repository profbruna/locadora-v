<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Estados
 * 
 * @author Yuri Alc�ntara
 * @package application.controllers
 */
class Estados extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("estado"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("estados/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Estados ",
            "view" => "estados/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->estado->quantidade()),
                "estados" => $this->estado->pegarPorLimite(registerPage(), page()),
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $estado = elements(Array("nome", "sigla"), $this->input->post());
            if ($this->validacao()) {
                if ($this->estado->adicionar($estado)) {
                    $this->mensagem->sucesso("estados/adicionar");
                } else {
                    $this->mensagem->erro("estados/listar");
                }
            } else {
                $this->mensagem->sucesso("estados/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar Estados",
            "view" => "estados/adicionar",
            "data" => Array(
                "estados" => $this->estado->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {

        $id = $this->uri->segment(3);
        if (!$this->estado->existe($id)) {
            redirect("estados/editar");
        }

        if ($this->input->post()) {
            $estado = elements(Array("nome", "sigla"), $this->input->post());
            if ($this->estado->editarPeloId($id, $estado)) {
                $this->mensagem->sucesso("estados/listar/");
            } else {
                $this->mensagem->erro("estados/editar/" . $id);
            }
        }

        $data = Array(
            "title" => "Editar Estados",
            "view" => "estados/editar",
            "data" => Array(
                "estados" => $this->estado->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->estado->existe($id)) {
            redirect("estados/listar");
        }
        $this->load->model(Array("cidade"));
        $Existe = ($this->cidade->listarPorCondicoes(array("estado_id" => $id)));
        if (count($Existe) > 0) {
            $this->mensagem->erro("estados/listar");
        } else {
            if ($this->estado->deletarPeloId($id)) {
                $this->mensagem->sucesso("estados/listar");
            } else {
                $this->mensagem->erro("estados/listar");
            }
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

        $this->form_validation->set_rules("nome", 'Nome', 'required');
        $this->form_validation->set_rules("sigla", 'Sigla', 'required');

        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */