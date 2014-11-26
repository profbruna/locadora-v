<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Model :: Telefone
 * 
 * @author Patrick Jean
 * @package application.models
 */
class Telefone extends App {

    protected $table = "telefone";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
