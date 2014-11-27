<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Produto
 * 
 * @author Gianfrancesco e Ramon
 * @package application.controllers
 */
class Produtos extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("produto", "tipo", "genero", "classificacao"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a��o
        redirect("produtos/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Produtos ",
            "view" => "produtos/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->produto->quantidade()),
                "produtos" => $this->produto->pegarPorLimite(registerPage(), page()),
                "tipos" => $this->tipo->listarComChave(),
                "generos" => $this->genero->listarComChave(),
                "classificacoes" => $this->classificacao->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $produto = elements(Array("nome", "tipo_id", "genero_id", "classificacao_id", "preco", "qtd_estoque", "qtd_locado", "qtd_descartado", "data_cadastro", "detalhes", "dias_devolucao", "status"), $this->input->post());
            if ($this->validacao()) {
 
                if ($this->produto->adicionar($produto)) {
                    $this->mensagem->sucesso("produtos/listar");
                } else {
                    $this->mensagem->erro("produtos/adicionar");
                }
            } else {
                $this->mensagem->erro("produtos/adicionar");
            }
        }
        $data = Array(
            "title" => "Adicionar Produtos",
            "view" => "produtos/adicionar",
            "data" => Array(
                "tipos" => $this->tipo->listarTodos(),
                "generos" => $this->genero->listarTodos(),
                "classificacoes" => $this->classificacao->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->produto->existe($id)) {
            redirect("produtos/listar");
        }
        if ($this->input->post()) {
            $produto = elements(Array("nome", "tipo_id", "genero_id", "classificacao_id", "preco", "qtd_estoque", "qtd_locado", "qtd_descartado", "data_cadastro", "detalhes", "dias_devolucao", "status"), $this->input->post());
            if ($this->validacao()) {
                if ($this->produto->editarPeloId($id, $produto)) {
                    $this->mensagem->sucesso("produtos/listar");
                } else {
                    $this->mensagem->erro("produtos/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Produtos",
            "view" => "produtos/editar",
            "data" => Array(
                "produto" => $this->produto->listarPorId($id),
                "tipos" => $this->tipo->listarTodos(),
                "generos" => $this->genero->listarTodos(),
                "classificacoes" => $this->classificacao->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->produto->existe($id)) {
            redirect("produtos/listar");
        }
        if ($this->produto->deletarPeloId($id)) {
            $this->mensagem->sucesso("produtos/listar");
        } else {
            $this->mensagem->erro("produtos/listar");
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
        $this->form_validation->set_rules("nome", "nome", "required");
        $this->form_validation->set_rules("tipo_id", "tipo_id", "required");
        $this->form_validation->set_rules("genero_id", "genero_id", "required");
        $this->form_validation->set_rules("classificacao_id", "classificacao_id", "required");
        $this->form_validation->set_rules("preco", "preco", "required");
        $this->form_validation->set_rules("qtd_estoque", "qtd_estoque", "required");
        $this->form_validation->set_rules("qtd_locado", "qtd_locado", "required");
        $this->form_validation->set_rules("qtd_descartado", "qtd_descartado", "required");
        $this->form_validation->set_rules("data_cadastro", "data_cadastro", "required");
        $this->form_validation->set_rules("detalhes", "detalhes", "required");
        $this->form_validation->set_rules("dias_devolucao", "dias_devolucao", "required");
        $this->form_validation->set_rules("status", "status", "required");
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */