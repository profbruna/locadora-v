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
class Cidade extends App {

    protected $table = "cidade";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
