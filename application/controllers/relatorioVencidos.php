<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: relatorioVencidos
 * 
 * @author Camila Jung e Ruan C�lio
 * @package application.controllers
 */
class RelatorioVencidos extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioVencido"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a��o
        redirect("relatorioVencidos/listar");
    }

    /**
     * listar
     */
    public function listar() {
        $dados = $this->relatorioVencido->listarNomes();
        $data = Array(
            "title" => " Listar Relat�rios Vencidos ",
            "view" => "relatorioVencidos/listar",
            "data" => Array(
                "paginacao" => createPaginate( strtolower(get_class()), $this->relatorioVencido->quantidade()),
                "relatorioVencidos" => $dados
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */