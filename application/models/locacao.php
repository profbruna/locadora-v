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

     /**
     * @description LIstagem de dados diferente
     * 
     * @param Integer $limite
     * @param Integer $inicio
     * @return array : boolean
     */
    public function pegarPorLimiteEspecial($limite = 10, $inicio = 0) {
        $this->db->limit($limite, $inicio);
        $locacoes = $this->db->get($this->table)->result();
        $retorno = Array();
        foreach ($locacoes as $locacacao) {
            $produto_locacao = $this->db->get_where( "produto_locacao" , Array( "locacao_id" => $locacacao->id ) )->result();
            if(isset($produto_locacao[0])){
                $produto_locacao = $produto_locacao[0];
            }else{
                $produto_locacao = Array();
            }
            $retorno[] = Array(
                "locacao" => $locacacao,
                "produto_locacao" => $produto_locacao
            );
        }
        return $retorno;
    }
    
    /**
     * @description
     * 
     * @param Integer $id
     * @param Integer $quantidade
     */
    public function atualizarValor( $id  ){
        $produtosLocacoes = $this->db->get_where( "produto_locacao" , Array( "locacao_id"=> $id )  )->result();
        $produtos = $this->produto->listarComChave();
        $valorTotal = 0;
        foreach( $produtosLocacoes as $produtoLocacao ){
            $valorTotal += $produtos[ $produtoLocacao->produto_id  ]->preco  *  $produtoLocacao->quantidade ;
        }
        $this->locacao->editarPeloId( $id , Array( "valor" => $valorTotal ) );
    }
    
    /**
     * @description
     * 
     * @param type $id
     * @param type $valor
     * @return type
     */
    public function diminuirValor( $id , $produtoID, $quantidade ){
        $locacao = $this->db->get_where( "locacao" , Array( "id"=> $id )  )->result();
        $produtos = $this->produto->listarComChave();
        
        $novoValor = (int)$locacao[0]->valor - $produtos[$produtoID]->preco * $quantidade;
        return $this->locacao->editarPeloId( $id , Array( "valor" => $novoValor ) );
    }
    

}
