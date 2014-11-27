<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: Relatório de cliente
 * 
 * @author Gianfrancesco e Ramon
 * @package application.controllers
 */
class RelatorioAniversariantes extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("RelatorioAniversariante"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem sem nenhum dados no relatório
        $data = Array(
            "title" => "Lista de Aniversáriantes",
            "view" => "relatorioAniversariantes/listar",
            "data" => Array(
                "relatorioAniversariantes" => null
            )
        );
        $this->load->view("layouts/default", $data);
    }

    /**
     * listar
     */
    public function listar() {

        $data_inicial = explode('-',$this->input->post("data_inicial"));
        $data_final = explode('-',$this->input->post("data_final"));
        $dia_ini = $data_inicial[2];
        $mes_ini = $data_inicial[1];
        $dia_fim = $data_final[2];
        $mes_fim = $data_final[1];
        if ($this->validacao()) {
            $data = Array(
                "title" => " Lista de Aniversáriantes ",
                "view" => "relatorioAniversariantes/listar",
                "data" => Array(
                    "relatorioAniversariantes" => $this->RelatorioAniversariante->pegarPorLimiteData($dia_ini, $dia_fim, $mes_ini, $mes_fim)
                )
            ); 
            $this->load->view("layouts/default", $data);
        } else {
            $this->mensagem->erro("relatorioAniversariantes/");
        }
    }

    /**
     * --------------------------------------------------------------------------
     * ---------------------------------
     * ------ Métodos especificos
     */

    /**
     * @description Método que realiza validação dos campos
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