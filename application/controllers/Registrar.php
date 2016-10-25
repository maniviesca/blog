<?php
//if (! defined('BASEPATH')) exit ('No direct script access allowed');


class Registrar extends CI_Controller
{
	
	

	public function index()
	{
		$Data = array('title' => 'Perfil');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Bienvenido al registro' ,'Descripcion' =>'Aqui podras hacer un usuario nuevo<br>');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		 
		$this->load->view("/usuarios/Reg_usuario");
		$this->load->view("/guest/Footer");
	}
}

?>