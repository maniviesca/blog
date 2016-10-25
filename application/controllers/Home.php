<?php
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
	
	$this->load->library("pagination");
	$config['base_url']= base_url();
	$config['total_rows']= $this->Post->num_post();
	$config['per_page']= 6;
	$config['uri_segment']= 3;
	$config['num_links']= 5;
	$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul>';
	$config['first_link'] = false;
	$config['last_link'] = false;
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['prev_link'] = '&laquo';
	$config['prev_tag_open'] = '<li class="prev">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&raquo';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$this->pagination->initialize($config);
	$this->load->model('Post');
	$Result = $this->Post->getPagination($config['per_page']); 
	$Data['consulta'] = $Result;
	$Data['pagination'] = $this->pagination->create_links();
	$this->load->view("/guest/Content",$Data);
	$this->load->view("/guest/Footer");
	//$this->load->view("Home_view",$Data);


}
}