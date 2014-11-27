<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Produtoslocacoes
 * 
 * @author Rodrigo Cachoeira
 * @author Gabriel Cordeiro
 * @package application.controllers
 */
class Produtoslocacoes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("locacao", "cliente", "produto", "condicao", "produtolocacao"));
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
        $id = $this->uri->segment(3);
        if (!$this->locacao->existe($id)) {
            redirect("locacoes/listar");
        }
        $data = Array(
            "title" => "Adicionar produtos a locação",
            "view" => "produtoslocacoes/listar",
            "data" => Array(
                "produtos" => $this->produto->listarComChave(),
                "produtosLocacoes" => $this->produtolocacao->listarPorCondicoes(Array("locacao_id" => $id)),
                "locacao" => $this->locacao->listarPorId( $id )
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * adicionar
     */
    public function adicionar() {
        if ($this->input->post()) {
            $produtoLocacao = elements(Array("produto_id", "quantidade", "locacao_id"), $this->input->post());            
            if ($this->validacao()) {
                if ($this->produto->locacao($produtoLocacao["produto_id"], $produtoLocacao["quantidade"])) {
                    if ($this->produtolocacao->adicionar($produtoLocacao)) {
                        $this->locacao->atualizarValor($produtoLocacao["locacao_id"]);
                        $this->mensagem->sucesso("produtoslocacoes/listar/" . $this->input->post("locacao_id"));
                    }
                } else {
                    $this->mensagem->erro("produtoslocacoes/listar/" . $this->input->post("locacao_id"), "Não há estoque suficiente!");
                }
            }
        }
        $this->mensagem->erro("produtoslocacoes/listar/" . $this->input->post("locacao_id"));
    }

    /**
     * deletar
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        $locacaoID = $this->uri->segment(4);
        if (!$this->produtolocacao->existe($id)) {
            redirect("produtoslocacoes/listar/" . $locacaoID);
        }
        $produtolocacao = $this->produtolocacao->listarPorCondicoes(Array("id" => $id));
        if ($this->produto->locacao($produtolocacao[0]->produto_id, $produtolocacao[0]->quantidade, true)) {
            if ($this->produtolocacao->deletarPeloId($id)) {
                $this->locacao->diminuirValor( $produtolocacao[0]->locacao_id , $produtolocacao[0]->produto_id, $produtolocacao[0]->quantidade );
                $this->mensagem->sucesso("produtoslocacoes/listar/" . $locacaoID);
            }
        }
        $this->mensagem->erro("produtoslocacoes/listar/" . $locacaoID);
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
        $this->form_validation->set_rules("produto_id", 'Observações', 'required');
        $this->form_validation->set_rules("locacao_id", 'Cliente', 'required');
        $this->form_validation->set_rules("quantidade", 'Condição de Pagamento', 'required');

        if ($this->input->post("quantidade") <= 0) {
            return false;
        }

        //executar validações
        return $this->form_validation->run();
    }

}
