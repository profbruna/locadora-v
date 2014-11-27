<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class relatorioLocacoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioLocacao", "produto"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a��o
        $data = Array(
            "title" => " Listar Relatórios de Locações ",
            "view" => "relatorioLocacoes/listar",
            "data" => Array(
                "relatorioLocacoes" => null
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * listar
     */
    public function listar() {

        $data_inicial = $this->input->post("data_inicial");
        $data_final = $this->input->post("data_final");
        $data = Array(
            "title" => " Listar Relatórios de Locações ",
            "view" => "relatorioLocacoes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->relatorioLocacao->quantidade()),
                "relatorioLocacoes" => $this->relatorioLocacao->pegarPorLimiteData($data_inicial, $data_final),
                "produtos" => $this->produto->listarComChave()
            )
        );
        $this->load->view("layouts/default", $data);
    }
    
    
    
    public function validacao() {
        $this->form_validation->set_rules("descricao", "Descrição", "required");
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */