<?php


class Login extends CI_Controller
{
	public function index()
	{
		$Email 	 	= $this->input->post('email');
		$Password 	= $this->input->post('password');
	
		$this->load->model("Usuario");
		$Fila = $this->Usuario->getUser($Email);

		if($Fila != null)
		{
			if(password_verify($Password,$Fila->pass_usuario)){
				$Usuario = array(	
					'Email' => $Email,
					'id'	=> $Fila->id_usuario,
					'nom_usuario' =>$Fila->nom_usuario,
					'login' => TRUE);
				$this->session->set_userdata('login',$Usuario);
				redirect("/");
			}
			else{
				$this->session->set_flashdata('login','Usuario o contraseña incorrectos');
				$this->session->sess_destroy();
				redirect("/");}
		}
		else{ redirect("/");}		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
	
}
