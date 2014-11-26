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
class Usuarios extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("usuario"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a�ao
        redirect("usuarios/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Usu�rios ",
            "view" => "usuarios/listar",
            "data" => Array(
                "usuarios" => $this->usuario->listarTodos(),
                "usuario_id" => $this->usuario->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $usuario = elements(Array("nome", "email", "login", "status", "senha", "falha", "id"), $this->input->post());
            if ($this->usuario->adicionar($usuario)) {
                $this->mensagem->sucesso( "usuarios/adicionar");
            } else {
                $this->mensagem->erro( "usuarios/listar");
            }
        }
        $data = Array(
            "title" => "Adicionar Usuarios",
            "view" => "usuarios/adicionar",
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
        if (!$this->usuario->existe($id)) {
            redirect("usuarios/listar");
        }
        if ($this->input->post()) {
            $usuario = elements(Array("nome", "email", "login", "status", "senha"), $this->input->post());
            if ($this->validacao()) {
                if ($this->usuario->editarPeloId($id, $usuario)) {
                    $this->mensagem->sucesso("usuarios/listar");
                } else {
                    $this->mensagem->erro("usuarios/editar/" . $id);
                }
            }
        }
        $data = Array(
                "title" => "Editar Usu�rios",
            "view" => "usuarios/editar",
            "data" => Array(
                "usuario" => $this->usuario->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if( ! $this->usuario->existe( $id ) ){
            redirect( "usuarios/listar" );
        }   
        if( $this->usuario->deletarPeloId( $id ) ){
            $this->mensagem->sucesso( "usuarios/listar" );
        }else{
            $this->mensagem->erro( "usuarios/listar" );
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
            $this->form_validation->set_rules("nome", 'Nome', 'required');
            $this->form_validation->set_rules("senha", 'Senha', 'required');
            $this->form_validation->set_rules("login", 'Login', 'required');
            $this->form_validation->set_rules("senha", 'Senha', 'required');
//executar valida��es
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */