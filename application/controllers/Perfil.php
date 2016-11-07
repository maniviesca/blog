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
		$this->load->view("/usuarios/Content_user");
		$this->load->view("usuarios/Body_perfil",$Data);
		$this->load->view("/guest/Footer");
	}
	public function cambiarPassword()
	{
		$Data = array('title' => 'Contraseña');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Cambiar contraseña' ,'Descripcion' =>'');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper"); 
		$this->load->view("/usuarios/Cambiarpass");
		$this->load->view("/guest/Footer");
	}
	public function change()
	{
		$this->load->library('form_validation');
		$this->load->model('Crear_usuario');
		$this->form_validation->set_rules('correo', 'correo','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password','trim|required|matches[verificar]');
		$this->form_validation->set_rules('verificar', 'verificar','trim|required');
		if ($this->form_validation->run()== TRUE) 
		{

			$Correo = $this->input->post('correo');
			$Data = array(
				'pass_usuario' => password_hash($this->input->post('password'),PASSWORD_BCRYPT));
			$this->Crear_usuario->cambiarPassword($Correo,$Data);
			echo "si se pudo";
		}
	}
}
?>