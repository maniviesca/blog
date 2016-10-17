<?php
class Home extends CI_Controller
{
public function index()
{
	$Data = array('title' =>'Home' ,'mensaje'=>'Bienvenidos a mi blog' );
	$this->load->view("Home_view",$Data);
}
}