<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Condicao
 * 
 * @author Álvaro e Luis Fernando
 * @package application.models
 */
class Condicao extends App {

    protected $table = "condicao_pagamento";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
