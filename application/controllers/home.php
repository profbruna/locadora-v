<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller {


   public function index() {
       $this->load->view("home/index");
        $data = Array(
            "title" => " Listar Usuários ",
            "view" => "home/index",
            "data" => Array(
            )
        );
        $this->load->view("layouts/default", $data);
    }
}
