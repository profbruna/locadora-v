<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Cidades
 * 
 * @author Camila Jung e Ruan Célio
 * @package application.controllers
 */
class Generos extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("genero"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("generos/listar");
    }

    /**
     * listar
     */
    //
    //echo $this->pagination->create_links()
    public function listar() {
        $data = Array(
            "title" => " Listar Gênero ",
            "view" => "generos/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->genero->quantidade()),
                "generos" => $this->genero->pegarPorLimite(registerPage(), page()),
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $genero = elements(Array("descricao"), $this->input->post());
            if ($this->validacao()) {
                if ($this->genero->adicionar($genero)) {
                    $this->mensagem->sucesso("generos/adicionar");
                } else {
                    $this->mensagem->erro("generos/listar");
                }
            } else {
                $this->mensagem->sucesso("generos/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar Gêneros",
            "view" => "generos/adicionar",
            "data" => Array(
                "generos" => $this->genero->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->genero->existe($id)) {
            redirect("generos/listar");
        }
        if ($this->input->post()) {
            $genero = elements(Array("descricao"), $this->input->post());
            var_dump($genero);
            if ($this->validacao()) {

                if ($this->genero->editarPeloId($id, $genero)) {
                    $this->mensagem->sucesso("generos/listar");
                } else {
                    $this->mensagem->erro("generos/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Gêneros",
            "view" => "generos/editar",
            "data" => Array(
                "genero" => $this->genero->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->genero->existe($id)) {
            redirect("generos/listar");
        }
        $this->load->model(Array("produto"));
        $Existe = ($this->produto->listarPorCondicoes(array("genero_id" => $id)));
        if (count($Existe) > 0) {
            $this->mensagem->erro("generos/listar");
        } else {
            if ($this->genero->deletarPeloId($id)) {
                $this->mensagem->sucesso("generos/listar");
            } else {
                $this->mensagem->erro("generos/listar");
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
        $this->form_validation->set_rules("descricao", 'Descricao', 'required');

        //executar valida��es
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */