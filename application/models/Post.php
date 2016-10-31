<?php
class Post extends CI_Model
{
	public function getPost()
	{
		return $this->db->get('post');

	}
	public function getPostByName($Name ='')
	{
		$Result = $this->db->get_where('post',array('id_post' => $Name));
		//$Result = $this->db->query("SELECT * FROM post WHERE id_post = '" . $Name . "'");
		return  $Result ->row();
	}
	public function getPostByUser($User = '')
	{
		$Result = $this->db->get_where('post',array('nom_usuario' => $User));
		return $Result->result();
	}
	public function insert($Tabla,$Data)
	{
		return $this->db->insert($Tabla,$Data);
		
	}
	public function delete($Id)
	{
		return $this->db->delete('post',array('id_post' => $Id));

	
	}
}
