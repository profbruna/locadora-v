<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Locacoes
 * 
 * @author Rodrigo Cachoeira
 * @author Gabriel Cordeiro
 * @package application.controllers
 */
class Locacoes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("locacao", "cliente", "produto", "condicao", "produtolocacao"));
        $this->load->helper(Array("functions"));
    }

    /**
     * index
     */
    public function index() {
        redirect("locacoes/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $data = Array(
            "title" => " Listar Locações ",
            "view" => "locacoes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->locacao->quantidade()),
                "locacoes" => $this->locacao->pegarPorLimiteEspecial(registerPage(), page()),
                "produtos" => $this->produto->listarComChave(),
                "clientes" => $this->cliente->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $locacao = elements(Array("cliente_id", "condicao_pagamento_id", "observacoes"), $this->input->post());
            $locacao["data"] = Date("Y-m-d");
            $locacao["hora"] = Date("H:i:s");
            if ($this->locacao->adicionar($locacao)) {
                $locacaoCadastrada = $this->locacao->listarUltimo();
                $this->mensagem->sucesso("produtoslocacoes/listar/" . $locacaoCadastrada[0]->id);
            }
            $this->mensagem->erro("locacoes/index");
        }
        $data = Array(
            "title" => "Adicionar Locações",
            "view" => "locacoes/adicionar",
            "data" => Array(
                "clientes" => $this->cliente->listarTodos(),
                "condicoes" => $this->condicao->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->locacao->existe($id)) {
            redirect("locacao/listar");
        }
        if ($this->produtolocacao->deletarPorCondicoesEspecial(Array("locacao_id" => $id))) {
            if ($this->locacao->deletarPeloId($id)) {
                $this->mensagem->sucesso("locacoes/listar");
            }
        }
        $this->mensagem->erro("locacoes/listar");
    }

    /**
     * info
     */
    public function info() {
        $id = $this->uri->segment(3);
        if (!$this->locacao->existe($id)) {
            redirect("locacao/listar");
        }
        $data = Array(
            "title" => "Informações sobre as locações",
            "view" => "locacoes/info",
            "data" => Array(
                "locacao" => $this->locacao->listarPorId($id),
                "produtosLocacoes" => $this->produtolocacao->listarPorCondicoes(Array("locacao_id" => $id)),
                "produtos" => $this->produto->listarComChave(),
                "clientes" => $this->cliente->listarComChave(),
                "condicoes" => $this->condicao->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->locacao->existe($id)) {
            redirect("locacao/listar");
        }
        if ($this->input->post()) {
            $locacao = elements(Array("condicao_pagamento_id", "observacoes"), $this->input->post());
            if ($this->locacao->editarPeloId($id, $locacao)) {
                $this->mensagem->sucesso("locacoes/listar/" . $id);
            }
            $this->mensagem->erro("locacoes/index");
        }
        $data = Array(
            "title" => "Adicionar Locações",
            "view" => "locacoes/editar",
            "data" => Array(
                "clientes" => $this->cliente->listarTodos(),
                "condicoes" => $this->condicao->listarTodos(),
                "locacao" => $this->locacao->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ Métodos especificos
     */

    /**
     * @description Método que realiza as validações dos campos
     * 
     * @return boolean
     */
    private function validacao() {
        $this->form_validation->set_rules("observacoes", 'Observações', 'required');
        $this->form_validation->set_rules("cliente_id", 'Cliente', 'required');
        $this->form_validation->set_rules("condicao_pagamento_id", 'Condição de Pagamento', 'required');

        //executar validações
        return $this->form_validation->run();
    }

}