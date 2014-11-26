<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Model :: Gênero
 * 
 * @author Camila Jung e Ruan Célio
 * @package application.models
 */
class Genero extends App {

    protected $table = "genero";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
