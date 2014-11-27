<?php
 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Model :: Locacao
 * 
 * @author Rodrigo Cachoeira
 * @package application.models
 */
class Locacao extends App {

    protected $table = "locacao";
    
    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    

}
