<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Função que define a quantidade
 * de registros por página
 * 
 * @return integer
 */
if (!function_exists('registerPage')) {

    function registerPage() {
        return 15;
    }

}

/**
 * Função que define em qual
 * segmento estará o valor da página
 * para a paginação
 * 
 * @return integer
 */
if (!function_exists('numSegment')) {

    function numSegment() {
        return 4;
    }

}


/**
 * Função que cria a paginação
 * 
 * @param string $table
 * @param integer $total
 * @return string
 */
if (!function_exists('createPaginate')) {

    function createPaginate($table, $total) {
        //carregando a instancia
        $instance = &get_instance();

        //carregando a biblioteca
        $instance->load->library('pagination');

        $config['base_url'] = base_url($table . '/listar/page/');
        $config['total_rows'] = $total;
        $config['per_page'] = registerPage();
        $config["uri_segment"] = numSegment();
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '<div>';
        $config['first_link'] = 'Primeiro';
        $config['last_link'] = 'Último';
        $config['next_link'] = 'Próximo';
        $config['prev_link'] = 'Anterior';

        //iniciando a paginação
        $instance->pagination->initialize($config);
        //retornando a paginação
        return $instance->pagination->create_links();
    }

}

/**
 * Função que verifica em qual
 * página o usuário está para
 * retornar a paginação correta
 * 
 * @return integer
 */
function page() {
    $instance = &get_instance();
    if ($instance->uri->segment(numSegment())) {
        return $instance->uri->segment(numSegment());
    }
    return 0;
}

/* End of file paginate_helper.php */
/* Location: ./application/helpers/paginate_helper.php */
