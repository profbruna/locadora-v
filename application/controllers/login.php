<?php

class Login extends CI_Controller {

    public function index() {
        $dados = array(
            "title" => "Login"
        );
        $this->load->view('login/index', $dados);
    }

    function efetua_login() {
        $this->load->model('loginModel');
        $dados = array(
            "usuario" => $this->form_validation->set_rules('login', 'Login', 'required'),
            "senha" => $this->form_validation->set_rules('senha', 'Senha', 'Required')
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {
            $QueryLogin = $this->loginModel->verificaLogin();
            if ($QueryLogin != FALSE) {
                if ($QueryLogin->status == 1) {
                    $query = $this->loginModel->verificaLoginCompleto();
                    if ($query) {
                        $dados = array(
                            "login" => $this->input->post('login'),
                            "logado" => TRUE
                        );
                        $this->loginModel->criaLog($QueryLogin->id,1);
                        $this->session->set_userdata($dados);
                        redirect('home/index');
                    } else {
                        $this->loginModel->setFalha($QueryLogin);
                        
                        $this->session->set_flashdata('errorLogin', 'Usuário ou Senha estão incorretos ou não existem');
                    }
                } else {
                    $this->session->set_flashdata('errorLogin', 'Você foi bloqueado, entre em contato com o suporte');
                
                }
            } else {
                $this->session->set_flashdata('errorLogin', 'Usuário ou Senha estão incorretos ou não existem');
            }
            redirect('login/index');
        }
    }
    function logout() {
        $this->session->sess_destroy();
        redirect('login/index');
    }

}

