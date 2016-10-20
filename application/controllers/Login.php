<?php


class Login extends CI_Controller
{
	public function index()
	{
		$Email 	 	= $this->input->post('email');
		$Password 	= $this->input->post('password');

		//echo $Email . " " . $Password;
		$Usuario = array('Usuario' => $Email,'id'=> 0,'login' => true);
		$this->session->set_userdata($Usuario);

		echo $this->session->userdata('email');
	}
	
}
