<?php
if(!defined('BASEPATH'))
	exit('No direct script acces allowed');
class Home extends CI_Controller
{
public function index()
{
	//$this->session->sess_destroy();
	$Data = array('title' =>'Home');
	$this->load->view("/guest/Head",$Data);
	
	//$Data = array('app' => 'Blog');
	$this->load->view("/guest/Navegacion");
	$Data = array('Post' => 'Blog' ,'Descripcion' =>'Por Maria Viesca');
	$this->load->view("/guest/Header",$Data);
	
	$Result= $this->Post->getPost();
	$Data = array('consulta'=>$Result);	
	

	$this->load->view("/guest/Content",$Data);
	$this->load->view("/guest/Footer");
	//$this->load->view("Home_view",$Data);


}
}