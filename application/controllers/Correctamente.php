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
}
?>
