<?php
class Home extends CI_Controller
{
public function index()
{
	
	$Data = array('title' =>'Home');
	$this->load->view("/guest/Head",$Data);
	
	$Data = array('app' => 'Blog');
	$this->load->view("/guest/Navegacion",$Data);
	$Data = array('Post' => 'Blog' ,'Descripcion' =>'Por Maria Viesca');
	$this->load->view("/guest/Header",$Data);
	
	$this->load->model('Post');
	$Result = $this->Post->getPost(); 
	//$Result=$this->db->get('post');
	$Data = array('consulta' => $Result);
	
	$this->load->view("/guest/Content",$Data);
	$this->load->view("/guest/Footer");
	//$this->load->view("Home_view",$Data);


}
}