<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Classificação
 * 
 * @author Dã e Nicolas
 * @package application.controllers
 */
class Classificacoes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("classificacao"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a��o
        redirect("classificacoes/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Classificações ",
            "view" => "classificacoes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->classificacao->quantidade()),
                "classificacoes" => $this->classificacao->pegarPorLimite(registerPage(), page())
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $classificacao = elements(Array("descricao"), $this->input->post());
            if ($this->validacao()) {
                if ($this->classificacao->adicionar($classificacao)) {
                    $this->mensagem->sucesso("classificacoes/adicionar");
                } else {
                    $this->mensagem->erro("classificacoes/listar");
                }
            } else {
                $this->mensagem->sucesso("classificacoes/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar Classificações",
            "view" => "classificacoes/adicionar",
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
        if (!$this->classificacao->existe($id)) {
            redirect("classificacoes/listar");
        }
        if ($this->input->post()) {
            $classificacao = elements(Array("descricao"), $this->input->post());
            if ($this->validacao()) {
                if ($this->classificacao->editarPeloId($id, $classificacao)) {
                    $this->mensagem->sucesso("classificacoes/listar");
                } else {
                    $this->mensagem->erro("classificacoes/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Classificações",
            "view" => "classificacoes/editar",
            "data" => Array(
                "classificacao" => $this->classificacao->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->classificacao->existe($id)) {
            redirect("classificacoes/listar");
        }
        $this->load->model(Array("produto"));
        $Existe = ($this->produto->listarPorCondicoes(array("classificacao_id" => $id)));
        if (count($Existe) > 0) {
            $this->mensagem->erro("classificacoes/listar");
        } else {
            if ($this->classificacao->deletarPeloId($id)) {
                $this->mensagem->sucesso("classificacoes/listar");
            } else {
                $this->mensagem->erro("classificacoes/listar");
            }
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
    public function validacao() {
        $this->form_validation->set_rules("descricao", "Descri��o", "required");
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */