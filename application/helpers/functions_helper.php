<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Método que converte uma data
 * do padrão USA para BR
 *
 * @param string $date
 * @return string
 */
if ( ! function_exists('dateToBR')){
	function dateToBR($date){
		$aux = explode( '-' , $date );
		return $aux[2].'/'.$aux[1].'/'.$aux[0];
	}
}


/**
 * Método que converte uma data
 * do padrão BR para USA
 *
 * @param string $date
 * @return string
 */
if( ! function_exists( 'dateToUSA' ) ){
	function dateToUSA($date){
		$aux = explode( '/' , $date );
		return $aux[2].'-'.$aux[0].'-'.$aux[1];
	}
}



/**
* Método que limita o número
* de caracteres de u texto, adicionando
* ... ao final, caso este ultrapasse o 
* número máximo de caracteres
* 
* @param string $text
* @return string
*/
if( ! function_exists( 'textLimit' ) ){
	function textLimit($text){
		return $text;
	}
}


/* End of file functions_helper.php */
/* Location: ./application/helpers/functions_helper.php */
