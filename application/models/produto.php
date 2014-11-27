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
class Produto extends App {

    protected $table = "produto";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    public function locacao($id, $quantidade, $devolucao = false) {
        $produto = $this->listarPorId($id);
        if ($produto[0]->qtd_estoque - $produto[0]->qtd_locado < $quantidade && $devolucao == false) {
            return false;
        } else {
            if ($devolucao) {
                return $this->editarPeloId($id, Array("qtd_locado" => (int) $produto[0]->qtd_locado - $quantidade));
            } else {
                return $this->editarPeloId($id, Array("qtd_locado" => (int) $produto[0]->qtd_locado + $quantidade));
            }
        }
    }

}
