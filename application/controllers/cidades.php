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
class Cidades extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("cidade", "estado", "endereco"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a ação
        redirect("cidades/listar");
    }

    /**
     * listar
     */
    //
    //echo $this->pagination->create_links()
    public function listar() {
        $data = Array(
            "title" => " Listar Cidades ",
            "view" => "cidades/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->cidade->quantidade()),
                "cidades" => $this->cidade->pegarPorLimite(registerPage(), page()),
                "estados" => $this->estado->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $cidade = elements(Array("nome", "estado_id"), $this->input->post());
            if ($this->validacao()) {
                if ($this->cidade->adicionar($cidade)) {
                    $this->mensagem->sucesso("cidades/listar");
                } else {
                    $this->mensagem->erro("cidades/adiconar");
                }
            } else {
                $this->mensagem->erro("cidades/adiconar");
            }
        }
        $data = Array(
            "title" => "Adicionar Cidades",
            "view" => "cidades/adicionar",
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
        if (!$this->cidade->existe($id)) {
            redirect("cidades/listar");
        }
        if ($this->input->post()) {
            $cidade = elements(Array("nome", "estado_id"), $this->input->post());
            if ($this->validacao()) {
                if ($this->cidade->editarPeloId($id, $cidade)) {
                    $this->mensagem->sucesso("cidades/listar");
                } else {
                    $this->mensagem->erro("cidades/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Cidades",
            "view" => "cidades/editar",
            "data" => Array(
                "estados" => $this->estado->listarTodos(),
                "cidade" => $this->cidade->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->cidade->existe($id)) {
            redirect("cidades/listar");
        }
        $enderecos = $this->endereco->listarPorCondicoes(Array("cidade_id" => $id));
        if (!$enderecos) {
            if ($this->cidade->deletarPeloId($id)) {
                $this->mensagem->sucesso("cidades/listar");
            } else {
                $this->mensagem->erro("cidades/listar");
            }
        }else{
            $this->mensagem->erro( "cidades/listar", "Esta cidade possui endereços ligados a ela" );
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
        $this->form_validation->set_rules("estado_id", 'Estado', 'required');

        //executar validações
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */