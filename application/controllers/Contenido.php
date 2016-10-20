<?php


class Contenido extends CI_Controller
{
	public function Post($Name)
	{
		
		$Fila = $this->Post->getPostByName($Name);
		$Data = array('title' =>$Fila->titulo_post);
		$this->load->view("/guest/Head",$Data);
		$Data = array('app' => 'Blog');
		$this->load->view("/guest/Navegacion",$Data);
		$Data = array('Post' => $Fila->titulo_post ,'Descripcion' =>$Fila->autor_post,'Fecha'=>$Fila->fecha_post);
		$this->load->view("/Posts/Header_post",$Data);
		$Data = array('Contenido' => $Fila->cont_post );
		$this->load->view("/guest/Post_vista",$Data);

		//$this->load->view("/guest/Footer");
		$this->load->view("comentario");
		
	//	echo $Fila->titulo_post . "<br>";
	//	echo $Fila->cont_post . "<br>";
	//	echo $Fila->autor_post . "<br>";
	//	echo $Fila->fecha_post . "<br>";
		//print_r($Fila);
	}
}
?>
