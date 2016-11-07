<?php

class Crear_usuario extends CI_Model
{
	public function getUser()
	{
		return $this->db->get('usuario');
	}

	public function insert($Tabla,$Data)
	{

		return $this->db->insert($Tabla,$Data);
	}
	public function cambiarPassword($Correo,$Data)
	{
		$this->db->where('mail_usuario', $Correo);
		$Result = $this->db->update('usuario',$Data);
		//return $Result;
	}
	public function getUsuario($Correo = '')
	{
		$Result = $this->db->get_where('usuario',array('mail_usuario'=> $Correo));
		return $Result->row();
	}
}
?>