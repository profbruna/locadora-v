<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Model :: App
 * 
 * @author Rodrigo Cachoeira
 * @package application.models
 */
class App extends CI_Model {

    protected $table = "";

    /**
     * construct
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @description Método que lista todos os registros
     * 
     * @return array : boolean
     */
    public function listarTodos() {
        return $this->db->get($this->table)->result();
    }

    /**
     * @description Listar um registro segundo seu ID
     * 
     * @param $id
     * @return array : boolean
     */
    public function listarPorId($id) {
        if (isset($id)) {
            $this->db->where("id", $id);
            return $this->db->get($this->table)->result();
        }
        return false;
    }

    /**
     * @description Listar todos os registros referentes a uma(s) condição(ões)
     * 
     * @param Array $condicoes
     * @return array : boolean
     */
    public function listarPorCondicoes($condicoes = []) {
        if (is_array($condicoes) && !is_null($condicoes)) {
            $this->defineCondicoes($condicoes);
            return $this->db->get($this->table)->result();
        }
        return $this->listarTodos();
    }

    /**
     * @description Listar todos os registros com seus Ids sendo 
     * chave do array de retorno
     * 
     * @return array  boolean 
     */
    public function listarComChave() {
        $registros = [];
        foreach ($this->listarTodos() as $registro) {
            $registros[$registro->id] = $registro;
        }
        return $registros;
    }
    
    /**
     * @description Listar o último registro
     * 
     * @return Array : boolean
     */
    public function listarUltimo(){
        $this->db->order_by( "id" , "desc" );
        $this->db->limit( 1 , 0);
        return $this->db->get( $this->table )->result();
    }

    /**
     * @description Adicionar registros
     * 
     * @param array $dados
     * @return boolean
     */
    public function adicionar($dados = []) {
        if (is_array($dados)) {
            return $this->db->insert($this->table, $dados);
        }
        return false;
    }

    /**
     * @description Editar registros pelo ID
     * 
     * @param string $id
     * @param array $dados
     * @return boolean
     */
    public function editarPeloId($id, $dados = []) {
        if (is_array($dados) && $id != "") {
            $this->db->where("id", $id);
            return $this->db->update($this->table, $dados);
        }
        return false;
    }

    /**
     * @description Editar registros por condições especificas
     * 
     * @param array $condicoes
     * @param array $dados
     * @return boolean
     */
    public function editarPorCondicoes($condicoes = [], $dados = []) {
        if (is_array($condicoes) && is_array($dados)) {
            $this->defineCondicoes($condicoes);
            return $this->db->where($this->table, $dados);
        }
        return false;
    }

    /**
     * @description Deletar registro pelo ID
     * 
     * @param string $id
     * @return boolean
     */
    public function deletarPeloId($id) {
        if ($id != "") {
            $this->db->where("id", $id);
            return $this->db->delete($this->table);
        }
        return false;
    }

    /**
     * @description Deletar registros por condições
     * 
     * @param array $condicoes
     * @return boolean
     */
    public function deletarPorCondicoes($condicoes = []) {
        if (is_array($condicoes)) {
            $this->defineCondicoes($condicoes);
            return $this->db->delete($this->table);
        }
        return false;
    }

    /**
     * @description Contar a quantdade de registros
     * 
     * @return integer
     */
    public function quantidade() {
        return $this->db->count_all($this->table);
    }

    /**
     * @description Método que verifica se class existe
     * 
     * @param String $id
     * @return boolean : array
     */
    public function existe($id) {
        return $this->listarPorId($id);
    }

    /**
     * @description Método que define as condições de operações
     * @access private
     * 
     * @param array $condicoes
     */
    private function defineCondicoes($condicoes) {
        foreach ($condicoes as $coluna => $valor) {
            $this->db->where($coluna, $valor);
        }
    }

    /**
     * @description pega qtd por limite
     * 
     * @param type $limite
     * @param type $inicio
     * @return type
     */
    public function pegarPorLimite($limite = 10, $inicio = 0) {
        $this->db->limit($limite, $inicio);
        return $this->db->get($this->table)->result();
    }
    
 

}
