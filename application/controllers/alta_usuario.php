<?php
defned ('BASEPATH') OR exit ('No direct script access allowed');

class alta_usuario extends CI_Controller

public function __construct()
{
	parent::__construct
}

function index()
{
	$this->load->view('alta_usuario');
}