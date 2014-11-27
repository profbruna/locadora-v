<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Clientes
 * 
 * @author Amanda Croce, Victor Luz
 * @package application.controllers
 */
class RelatoriosABC extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioABC"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
            $data = Array(
            "title" => " Relatório Mais Locados ",
            "view" => "relatoriosABC/listar",
            "data" => Array(
                "relatorioABC" => null
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * listar
     */

    public function listar() {

        $dataInicio = $this->input->post("dataInicio");
        $dataFim = $this->input->post("dataFim");
        $data = Array(
            "title" => " Relatório Produtos mais Locados ",
            "view" => "relatoriosABC/listar",
            "data" => Array(
                "relatoriosABC" => $this->relatorioABC->pegarPorLimiteData($dataInicio, $dataFim)
            )
        );
        $this->load->view("layouts/default", $data);
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
    public function validacao($dados) {
        $this->form_validation->set_rules("quantidade", 'Quantidade', 'required');
      
        //executar valida��es
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */