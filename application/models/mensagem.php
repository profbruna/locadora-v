<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Estado
 * 
 * @author Rodrigo Cachoeira
 * @package application.models
 */
class Mensagem extends CI_Model {

    /**
     * @description seta as mensagens de sucesso
     * 
     * @param String $redirect
     */
    function sucesso($redirect = null) {
        $this->session->set_flashdata('output_text', 'Opera��o realizada com sucesso!');
        $this->session->set_flashdata('output_type', 'success');
        if (!is_null($redirect)) {
            redirect($redirect);
        }
    }

    /**
     * @description seta as mensagens de erro
     * 
     * @param String $redirect
     */
    function erro($redirect = null) {
        $this->session->set_flashdata('output_text', 'N�o foi poss�vel realizar a opera��o!');
        $this->session->set_flashdata('output_type', 'danger');
        if (!is_null($redirect)) {
            redirect($redirect);
        }
    }

}
