<?php

class Comentario extends CI_Model
{
	
	public function getComment()
	{
		return $this->db->get('comentario');
	}

	public function getId($Id = ''){
		$Result = $this->db->query("SELECT * FROM comentario WHERE id_post = '" . $Id . "'");
	}
	public function insert($Comentario = null){
		if ($Comentario != null) 
		{
			$Usuario = $Comentario['usuario'];
			$Titulo = $Comentario['titulo'];
			$Contenido = $Comentario['contenido'];
			

			$SQL = "INSERT INTO comentario(id_comentario,nom_usuario,titulo_comentario,cont_comentario,fecha_comentario) VALUES (null,'$Usuario','$Titulo','$Contenido',curdate());";
			if ($this->db->query($SQL)) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
	}
}

?>
