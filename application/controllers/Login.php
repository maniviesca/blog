<?php


class Login extends CI_Controller
{
	public function index()
	{
		$Email 	 	= $this->input->post('email');
		$Password 	= $this->input->post('password');
	

		$this->load->model("Usuario");
		$Fila = $this->Usuario->getUser($Email);

		if($Fila != null){
			if(password_verify($Password,$Fila->pass_usuario)){
				$Usuario = array(	
			'Email' => $Email,
			'id'	=> $Fila->id_usuario,
			'nom_usuario' =>$Fila->nom_usuario,
			'login' => true);
				$this->session->set_userdata('login',$Usuario);
				header("Location:".base_url());

			}else
			{
				//redirect()
				header("Location:".base_url());
			}
		}else
			{
				header("Location:".base_url());
			}		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location:".base_url());
	}
	
}
