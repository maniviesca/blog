<?php

class Comentario extends CI_Model
{
	
	public function getComment()
	{
		return $this->db->get('comentario');
		
	}

	public function getPostId($Id = ''){
		$Result = $this->db->get_where('comentario',array('id_post' => $Id));
		return $Result->result();
		//$Result = $this->db->query("SELECT * FROM comentario WHERE id_post = '" . $Name . "'");
		//return $Result->row();
	}

	public function insert($Tabla,$Data){
		return $this->db->insert($Tabla,$Data);
		
	}
	public function delete($Id){
		return $this->db->delete('comentario',array('id_post' => $Id));

	}
	public function deleteComment($Id)
	{
		return $this->db->delete('comentario',array('id_comentario' => $Id));

	
	}
}

?>
