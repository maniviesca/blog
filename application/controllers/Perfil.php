<?php
if (! defined('BASEPATH')) exit ('No direct script access allowed');


class Perfil extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')){
			 header("Location:" . base_url() );
		}
	}
	public function index()
	{
		$this->load->model("Post");
		
		$Data = array('title' => 'Perfil');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Bienvenido a tu perfil'  ,'Usuario' =>$this->session->userdata['login']['nom_usuario'],'Descripcion' =>'Aqui podras ver y crear tus posts<br>');
		$this->load->view("/usuarios/Perfil",$Data);
		$Usuario = $this->session->userdata['login']['nom_usuario'];	
		$Fila = $this->Post->getPostbyUser($Usuario);
		$Data = array(
			'consulta'=>$Fila);
		
		//$this->load->helper("bootstrap_helper")
		 
		$this->load->view("/usuarios/Content_user");
		$this->load->view("usuarios/Body_perfil",$Data);
		$this->load->view("/guest/Footer");
	}
}
?>