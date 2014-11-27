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

    function verificaQtd() {
        $verifica = $this->db->get_where('produto_locacao', Array('locacao_id' => $this->uri->segment(4)))->result();
        // Se existir mais de um produto locado, ele vai decrementar de 1 em 1 ate ele ser completamente removido
        if ($verifica[0]->quantidade > 1) {
            $info = Array(
                "quantidade" => $verifica[0]->quantidade - 1
            );
            $this->db->where('id', $this->uri->segment(3));
            $this->db->update('produto_locacao', $info);
            $qtdLocado = $this->db->get_where('produto', Array('id' => $this->uri->segment(5)))->result();
            $devolve = Array(
                "qtd_locado" => $qtdLocado[0]->qtd_locado - 1
            );
            $this->db->where('id', $this->uri->segment(5));
            $this->db->update('produto', $devolve);
            return $this->db->affected_rows();
        } else {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('produto_locacao');
            return $this->db->affected_rows();
        }
    }

    /*
     * Função que é responsável por devolver todos os produtos locados
     * Caso o usário queira devolver todos os produtos ao mesmo
     */

    function devolveTodos() {
        $qtdTotal = $this->db->get_where('produto_locacao', Array('locacao_id' => $this->uri->segment(4)))->result();
        $qtdLocado = $this->db->get_where('produto', Array('id' => $this->uri->segment(6)))->result();
        $info3 = Array(
            "qtd_locado" => $qtdLocado[0]->qtd_locado - $qtdTotal[0]->quantidade
        );
        $this->db->where('id', $this->uri->segment(6));
        $this->db->update('produto', $info3);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('produto_locacao');
        return $this->db->affected_rows();
    }

}
