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
	public function insert($Tabla,$Data)
	{
		return $this->db->insert($Tabla,$Data);
		



		/*
		la funcion insert tenia de parametros $Post = null
		if ($Post != null) 
		{
			
			$Titulo = $Post['titulo'];
			$Contenido = $Post['contenido'];
			$File_name = $Post['file_name'];
			$Autor = $Post['autor'];


			$SQL = "INSERT INTO post(id_post,titulo_post,cont_post,Imagen,autor_post,fecha_post) VALUES (null,'$Titulo','$Contenido','$File_name','$Autor',curdate());";
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

	/*public function getPostByYearName($Year = '',$Name =''){
		$Result = $this->db->query("SELECT * FROM post WHERE year(fecha_post) = '$Year' AND post LIKE '$Name' ");
		return $Result->row();
	}
	public function num_post(){

		$this->db->query("SELECT count(*) AS number FROM post")->row()->number;
		return intval('number');

	}
	public function getPagination($numero_pagina)
	{
		return $this->db->get("post",$numero_pagina,$this->uri->segment(3));
	}*/
}
