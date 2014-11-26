<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class relatorioClientes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioCliente"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a��o
        $data = Array(
            "title" => " Listar Relatórios de Clientes ",
            "view" => "relatorioClientes/listar",
            "data" => Array(
                "relatorioClientes" => null
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
            "title" => " Listar Relatórios de Clientes ",
            "view" => "relatorioClientes/listar",
            "data" => Array(
                "paginacao" => createPaginate(strtolower(get_class()), $this->relatorioCliente->quantidade()),
                "relatorioClientes" => $this->relatorioCliente->pegarPorLimiteData($data_inicial, $data_final)
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