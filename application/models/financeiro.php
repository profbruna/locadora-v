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
class Financeiro extends App {

    protected $table = "financeiro";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
