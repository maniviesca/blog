<?php
class Post extends CI_Model
{
	public function getPost()
	{
		return $this->db->get('post');

	}
	public function getPostByName($Name ='')
	{
		$Result = $this->db->query("SELECT * FROM post WHERE id_post = '" . $Name . "'");
		return  $Result ->row();
	}
}
