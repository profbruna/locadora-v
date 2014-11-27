<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controller :: relatorioValores
 * 
 * @author Yuri Alcântara
 * @package application.controllers
 */
class RelatorioValores extends CI_Controller {

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(Array("relatorioValor"));
    }

    /**
     * index
     */
    public function index() {
        //redirecionamento para a pagina de listagem quando nao for deninido qual a a?ao
        redirect("relatorioValores/listar");
    }

    /**
     * listar
     */
    
    public function listar(){
               
        if ($this->input->post()) {
            
            $dataIni = $this->input->post('dia1');
            $dataFin = $this->input->post('dia2');
            if ($this->validacao()) {                
                $result = $this->relatorioValor->listarPorData($dataIni, $dataFin, registerPage(), page());
                           
            }
                   
        }else{
            
            $result = array();
            
        }
        
        $data = Array(
            "title" => " Listar Estados ",
            "view" => "relatorioValores/listar",
            "data" => Array(
                "paginacao" => createPaginate( strtolower(get_class()), $this->relatorioValor->quantidade()),
                "relatos" => $result,
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
    public function validacao() {
        
        $this->form_validation->set_rules("dia1", 'Primeira data', 'required');
        $this->form_validation->set_rules("dia2",'Segunda data', 'required');
        
        return $this->form_validation->run();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */