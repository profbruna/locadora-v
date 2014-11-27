<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: Produto_locacao
 * 
 * @author Gabriel Cordeiro
 * @author Rodrigo Cachoeira
 * @package app.Models
 */
class Produtolocacao extends App {

    protected $table = "produto_locacao";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @description Deletar registros por condições e realiza o débito na quantidade do produto
     * 
     * @param array $condicoes
     * @return boolean
     */
    public function deletarPorCondicoesEspecial($condicoes = []) {
        $produtosLocacoes = $this->produtolocacao->listarPorCondicoes(Array("locacao_id" => $condicoes["locacao_id"]));
        foreach ($produtosLocacoes as $produtoLocacao) {
            $this->produto->locacao($produtoLocacao->produto_id, $produtoLocacao->quantidade, true);
        }
        if (is_array($condicoes)) {
            foreach ($condicoes as $coluna => $valor) {
                $this->db->where($coluna, $valor);
            }
            return $this->db->delete($this->table);
        }
        return false;
    }

}
