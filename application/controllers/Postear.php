<?php


class Postear extends CI_Controller
{
	public function index()
	{
		$this ->load->model("Insert_post");
		$this->load->view("/guest/Navegacion");
		$this->load->view("/Posts/Post_view");

	}

}