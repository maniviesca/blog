<?php

class Comentario extends CI_Model
{
	
	public function getComment()
	{
		return $this->db->get('comentario');
		
	}

	public function getPostId($Name = ''){
		$Result = $this->db->get_where('comentario',array('id_post' => $Name));
		return $Result->result();
		//$Result = $this->db->query("SELECT * FROM comentario WHERE id_post = '" . $Name . "'");
		//return $Result->row();
	}

	public function insert($Tabla,$Data){
		return $this->db->insert($Tabla,$Data);
		
		/*if ($Comentario != null) 
		{
			$Usuario = $Comentario['usuario'];
			$Titulo = $Comentario['titulo'];
			$Contenido = $Comentario['contenido'];
			

			$SQL = "INSERT INTO comentario(id_comentario,id_usuario,titulo_comentario,cont_comentario,fecha_comentario) VALUES (null,'$Usuario','$Titulo','$Contenido',curdate());";

			if ($this->db->query($SQL)) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}*/
	}
}

?>
