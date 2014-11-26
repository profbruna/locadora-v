<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Cliente
 * 
 * @author Amanda Croce, Victor Luz
 * @package application.models
 */
class Cliente extends App {

    protected $table = "cliente";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
