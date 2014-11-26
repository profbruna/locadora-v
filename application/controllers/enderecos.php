<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Enderecos
 * 
 * @author Ruan C�lio dos Anjos e Camila Torquato Jung
 */
class Enderecos extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(array('endereco', 'tipo', 'cidade', 'cliente'));
    }

    /**
     * adicionar um endere�o
     */
    public function adicionar() {
        if ($this->input->post()) {
            $endereco = elements(Array("cliente_id", "logradouro", "tipo", "cep", "numero", "bairro", "complemento", "cidade_id"), $this->input->post());
            if ($this->validacao()) {
                if ($this->endereco->adicionar($endereco)) {
                    $this->mensagem->sucesso("enderecos/adicionar");
                } else {
                    $this->mensagem->erro("enderecos/listar");
                }
            } else {
                $this->mensagem->sucesso("enderecos/adicionar");
            }
        }
        $data = Array(
            "title" => " Adicionar endereço ",
            "view" => "enderecos/adicionar",
            "data" => Array(
                'cidades' => $this->cidade->listarTodos(),
                'clientes' => $this->cliente->listarTodos(),
                'tipos' => $this->tipo->listarTodos()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * editar um ende�o
     */
    public function editar() {
        $id = $this->uri->segment(3);
        if (!$this->endereco->existe($id)) {
            redirect("enderecos/listar");
        }
        if ($this->input->post()) {
            $endereco = elements(Array("cliente_id", "logradouro", "tipo", "cep", "numero", "bairro", "complemento", "cidade_id"), $this->input->post());

            if ($this->validacao()) {
                if ($this->endereco->editarPeloId($id, $endereco)) {
                    $this->mensagem->sucesso("enderecos/listar");
                } else {
                    $this->mensagem->erro("enderecos/editar/" . $id);
                }
            }
        }
        $data = Array(
            "title" => "Editar Endereço",
            "view" => "enderecos/editar",
            "data" => Array(
                'cidades' => $this->cidade->listarTodos(),
                'clientes' => $this->cliente->listarTodos(),
                'tipos' => $this->tipo->listarTodos(),
                'endereco' => $this->endereco->listarPorId($id)
            )
        );
        $this->load->view("layouts/default", $data);
    }

    public function index() {
//redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("enderecos/listar");
    }

    /**
     * visualizar um endereco
     */
    public function listar() {
        $data = Array(
            "title" => " Listar endereço ",
            "view" => "enderecos/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->endereco->quantidade()),
                "enderecos" => $this->endereco->pegarPorLimite(registerPage(), page()),
                //'enderecos' => $this->endereco->listarTodos(),
                'cidades' => $this->cidade->listarComChave(),
                'tipos' => $this->tipo->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * deletar um endere�o
     */
    public function deletar() {
        $id = $this->uri->segment(3);
        if (!$this->endereco->existe($id)) {
            redirect("enderecos/listar");
        }
        if ($this->endereco->deletarPeloId($id)) {
            $this->mensagem->sucesso("enderecos/listar");
        } else {
            $this->mensagem->erro("enderecos/listar");
        }
    }

    /**
     * valida�?o de dados
     */
    function validacao() {
        $this->form_validation->set_rules('cliente_id', 'Cliente', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('complemento', 'Complemento', 'required');
        $this->form_validation->set_rules('cidade_id', 'Cidade', 'required');

        return $this->form_validation->run();
    }

}
