<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Classifica��o
 * 
 * @author Dã e Nicolas
 * @package application.controllers
 */
class RelatorioBaixas extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioBaixa"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem sem nenhum dados no relatório
        $data = Array(
            "title" => " Listar Relatórios de Baixas ",
            "view" => "relatorioBaixas/listar",
            "data" => Array(
                "relatorioBaixas" => null
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
        if ($this->validacao()) {
        $data = Array(
            "title" => " Listar Relatórios de Baixas ",
            "view" => "relatorioBaixas/listar",
            "data" => Array(
                "relatorioBaixas" => $this->relatorioBaixa->pegarPorLimiteData($data_inicial, $data_final)
            )
        );
        $this->load->view("layouts/default", $data);
        }else {
            $this->mensagem->erro("relatorioBaixas/");
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
        $this->form_validation->set_rules("data_inicial", "Data inicial", "required");
        $this->form_validation->set_rules("data_final", "Data final", "required");
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */