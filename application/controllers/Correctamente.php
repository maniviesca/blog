<?php
/**
* 
*/
class Correctamente extends CI_Controller
{
	public function index(){
		$Data = array('title' => 'Registrado');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Registrado correctamente' ,'Descripcion' =>'Tu usuario ha sido registrado correctamente, ya puedes iniciar sesión');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		$this->load->view("/guest/Footer");
	}
public function Posteado(){
		$Data = array('title' => 'Posteado');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'El post se ha creado correctamente' ,'Descripcion' =>'Puedes ver tu post en la pagina de Inicio');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		$this->load->view("/guest/Footer");
}
public function Comentado(){
		$Data = array('title' => 'Posteado');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'El comentario se ha creado correctamente' ,'Descripcion' =>'el autor sera avisado de tu comentario');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		$this->load->view("/guest/Footer");
}

public function noComentado(){
		$Data = array('title' => 'Comentar');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'El post no se pudo comentar correctamente' ,'Descripcion' =>'Intentelo de nuevo');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		$this->load->view("/guest/Footer");	
}
public function Eliminado(){
	$Data = array('title' => 'Comentar');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Eliminado' ,'Descripcion' =>'EL post ha sido eliminado correctamente');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		$this->load->view("/guest/Footer");	
}
}
?>
