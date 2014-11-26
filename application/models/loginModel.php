<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class loginModel extends CI_Model {

    function verificaLoginCompleto() {
        $this->db->where('login', $this->input->post('login'));
        $this->db->where('senha', $this->input->post('senha'));
        $query = $this->db->get('usuario');
        if ($query->num_rows == 1) {
            $DadosUpdate["falha"] = 0;
            $this->db->update('usuario', $DadosUpdate);
            return TRUE;
        }
    }

    function verificaLogin() {
        
        $this->db->where('login', $this->input->post('login'));
        $query = $this->db->get('usuario');
        if ($query->num_rows == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function criaLog($UserId,$Tipo) {  
        $data = date('Y-m-d');
        $hora = date("H:i:s");
        $DadosLog["navegador"] = $_SERVER["HTTP_USER_AGENT"];
        $DadosLog["ip"] = $_SERVER["REMOTE_ADDR"];
        $DadosLog["usuario_id"] = $UserId;
        $DadosLog["data"] = $data;
        $DadosLog["hora"] = $hora;
        $DadosLog["tipo"] = $Tipo;
        $query = $this->db->insert('log', $DadosLog);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function setFalha($DadosUser) {
        if ($DadosUser->falha < 4) {
            $DadosUpdate["falha"] = $DadosUser->falha + 1;
        } else {
            $DadosUpdate["status"] = 0;
        }
        $this->db->where('id', $DadosUser->id);
        $query = $this->db->update('usuario', $DadosUpdate);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function logado() {
        $logado = $this->session->userdata('logado');
        if (!isset($logado) || $logado != TRUE) {
            redirect('login/index');
            die();
        }
    }

}
