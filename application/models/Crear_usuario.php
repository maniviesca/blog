<? php


class Crear_usuario extends CI_Model
{
	public function insert($Usuario = null)
	{
		if ($Usuario != null) 
		{
			$Nombre = $Usuario['nombre'];
			$Contraseña = $Post['password'];
			$Email = $Post['email'];
		
			$SQL = "INSERT INTO usuario(id_usuario,nom_usuario,pass_usuairo,mail_usuario, VALUES (null,'$Nombre','$Contraseña','$Email');";
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