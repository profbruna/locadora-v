<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Cidade
 * 
 * @author Rodrigo Cachoeira
 * @package application.models
 */
class Usuario extends App {

    protected $table = "usuario";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
