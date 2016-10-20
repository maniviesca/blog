<?php
/**
* 
*/
class Insert_post extends CI_Model
{
	
	public function InsertPost(){
		$Data = array(
				'id'		=>		$this->input->post('id'),
				'titulo' 	=>	 	$this->input->post('titulo'),
				'contenido'	=>		$this->input->post('contenido'),
				'autor'		=>		$this->input->post('autor'),
				'fecha'		=>		$this->input->post('fecha'));
		$this->db->insert(post,$Data);
	}
}

?>