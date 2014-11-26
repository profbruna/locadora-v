<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Telefones
 * 
 * @author Patrick Jean
 * @package application.controllers
 */
class Telefones extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("telefone", "cliente"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a�ao
        redirect("telefones/listar");
    }

    /**
     * listar
     */
    //
    //echo $this->pagination->create_links()
    public function listar() {
        $id = $this->uri->segment(3);
        $data = Array(
            "title" => " Listar Telefones ",
            "view" => "telefones/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->telefone->quantidade()),
                "telefones" => $this->telefone->listarPorCondicoes(array('cliente_id' => $id)),
                "tipos" => Array(1 => "Residencial", 2 => "Comercial", 3 => "Celular", 4 => "Inativo")
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        $id = $this->uri->segment(3);
        if ($this->input->post()) {
            $telefone = elements(Array("numero", "tipo", "cliente_id"), $this->input->post());
            if ($this->validacao()) {
                if ($this->telefone->adicionar($telefone)) {
                    $this->mensagem->sucesso("telefones/adicionar/" . $id);
                } else {
                    $this->mensagem->erro("telefones/listar/" . $id);
                }
            } else {
                $this->mensagem->sucesso("telefones/adicionar/" . $id);
            }
        }
        $data = Array(
            "title" => "Adicionar Telefones",
            "view" => "telefones/adicionar",
            "data" => Array(
                "cliente" => $this->cliente->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->telefone->existe($id)) {
            redirect("telefones/listar");
        }
        if ($this->input->post()) {
            $telefone = elements(Array("numero", "tipo"), $this->input->post());
            if ($this->validacao()) {
                if ($this->telefone->editarPeloId($id, $telefone)) {
                    $this->mensagem->sucesso("clientes/listar");
                } else {
                    $this->mensagem->erro("clientes/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Telefones",
            "view" => "telefones/editar",
            "data" => Array(
                "telefone" => $this->telefone->listarPorId($id))
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->telefone->existe($id)) {
            redirect("telefones/listar");
        }
        if ($this->telefone->deletarPeloId($id)) {
            $this->mensagem->sucesso("clientes/listar/" . cliente);
        } else {
            $this->mensagem->erro("clientes/listar/" . $cliente);
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
        $this->form_validation->set_rules("numero", 'Numero', 'required');
        $this->form_validation->set_rules("tipo", 'Tipo', 'required');

        //executar valida��es
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */