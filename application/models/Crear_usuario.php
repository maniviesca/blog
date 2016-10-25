<?php

class Crear_usuario extends CI_Model
{
	public function getUser(){
		return $this->db->get('usuario');

	}


	public function insert($Usuario = null)
	{
		if ($Usuario != null) 
		{
			
			$Nombre = $Usuario['usuario'];
			$Password = $Usuario['password'];
			$Email = $Usuario['email'];
			$Sql ="INSERT INTO usuario(id_usuario,nom_usuario,pass_usuario,mail_usuario) VALUES (null,'$Nombre','$Password','$Email');";
			//$SQL = "INSERT INTO usuario(id_usuario,nom_usuario,pass_usuario,mail_usuario, VALUES (null,'$Nombre','$Contraseña','$Email');";

			if ($this->db->query($Sql)) 
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