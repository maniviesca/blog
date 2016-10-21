<?php
/**
* 
*/
class Usuario extends CI_Model
{
	public function getUser($Email = '')
	{
		$Result = $this->db->query(("SELECT * FROM usuario WHERE mail_usuario = '" . $Email . "'"));
		if ($Result->num_rows()>0){
			return $Result->row();
		}else{
			return null;
		}

	}
}
?>