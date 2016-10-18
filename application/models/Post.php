<?php
class Post extends CI_Model
{
	public function getPost()
	{
		return $this->db->get('post');

	}
}
?>