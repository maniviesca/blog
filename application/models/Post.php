<?php
class Post extends CI_Model
{
	public function getPost()
	{
		$this->db->order_by('fecha_post','DESC');
		return $this->db->get('post');
		

	}
	public function getPostByName($Name ='')
	{
		//$Result = $this->db->from('post')->where(array('id_post' => $Name))->order_by('fecha_post', 'ASC')->get();
		$Result = $this->db->get_where('post',array('id_post' => $Name));

		//$Result = $this->db->get_where('post',array('id_post' => $Name))->order_by("fecha_post","ASC");
		return  $Result->row();

	}
	public function getPostByUser($User = '')
	{
		$this->db->order_by('fecha_post','DESC');
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
	public function actualizar($Name,$Data)
	{
		$this->db->where('id_post', $Name);
		$query = $this->db->update('post',$Data);
	}

}
