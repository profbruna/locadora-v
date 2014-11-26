<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Tipo
 * 
 * @author Ramon Sasse e Gianfrancesco
 * @package application.models
 */
class Tipo extends App {

    protected $table = "tipo";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
