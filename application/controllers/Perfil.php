<?php
//if (! defined('BASEPATH')) exit ('No direct script access allowed');


class Perfil extends CI_Controller
{
	
	public function index()
	{
		$Data = array('title' => 'Perfil');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Bienvenido a tu perfil' ,'Descripcion' =>'Aqui podras ver y crear posts<br>');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper")
		 
		$this->load->view("/usuarios/Content_user");
		$this->load->view("/guest/Footer");
	}
}

?>