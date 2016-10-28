<?php

if(!defined('BASEPATH'))
	exit('No direct script acces allowed');
class Contenido extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	$this->load->library('Bcrypt');
	}

	public function Post($Name)//vista del post 
	{	
		$this->load->model("Comentario");
		$Fila = $this->Post->getPostByName($Name);
		
		$Data = array('title' =>$Fila->titulo_post);
	//	$Comment = $this->Comentario->getId($Name);
		$this->load->view("/guest/Head",$Data);
		$Data = array('app' => 'Blog');
		$this->load->view("/guest/Navegacion",$Data);
		$Data = array('Post' => $Fila->titulo_post ,
			'Descripcion' =>$Fila->nom_usuario,
			'Fecha'=>$Fila->fecha_post,
			'Imagen'=>$Fila->Imagen);
		//$this->security->xss_clean($Data);
		$this->load->view("/Posts/Header_post",$Data);
		$Data = array('Contenido' => $Fila->cont_post );
		$this->load->view("/guest/Post_vista",$Data);
		$Comentarios = $this->Comentario->getPostId($Name);
		//$this->security->xss_clean($Comentarios);
		//$Result= $this->Comentario->getComment(); // me trae todos los comentarios, no les hace el filtro
		$Data = array(
			'Consulta'=>$Comentarios);
		$this->load->view("/Posts/Comentario_vista",$Data);

		if ($this->session->userdata('login')){
		$this->load->view("/usuarios/Comentarios");}else{
			$this->load->view("Mensaje");
		}
		$this->load->view("/guest/Footer");
	}
	

	public function nuevo() //crear un post nuevo
	{
		if (!$this->session->userdata('login')){
			 header("Location:" . base_url() );
		}
		
		$Data = array('title' => 'Crear nuevo post');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Nuevo post' ,'Descripcion' =>'Creando un nuevo post');
		$this->load->view("/guest/Header",$Data);
		$this->load->helper("bootstrap_helper"); 
		$this->load->view("/usuarios/Nuevo");
		
		$this->load->view("/guest/Footer");
	}
	
public function userNuevo()//crear usuario nuevo
{
	

		$Data = array('title' => 'REGISTRARSE');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Registro' ,'Descripcion' =>'Nuevo usuario');
		$this->load->view("/guest/Header",$Data);
		$this->load->helper("bootstrap_helper"); 
		
		$this->load->view("/usuarios/Registrar_usuario");
		$this->load->view("/guest/Footer");

}

	public function insert()//subir el post a la base de datos
	{
		if (!$this->session->userdata['login']){
		 header("Location:" . base_url() );}

		//	$Post = $this->input->post();
		//	var_dump($this->session->userdata('nom_usuario'));exit;
			$this->load->model("File");
			$this->load->library('form_validation');
			$this->form_validation->set_rules('titulo', 'titulo','required');
			$this->form_validation->set_rules('contenido', 'contenido','required');
			$this->form_validation->set_message('required','Este campo es obligatorio');
				if ($this->form_validation->run()== TRUE) {
				$Data = array(
				'titulo_post' =>htmlspecialchars(( $this->input->post('titulo'))),
				'cont_post' =>htmlspecialchars(($this->input->post('contenido'))),
				'Imagen' => $this->File->UploadImage('./public/img','No es posible subir la imagen'),
				'nom_usuario' => $this->session->userdata['login']['nom_usuario']);
				//echo $this->session->userdata('email');

				$this->Post->insert('post',$this->security->xss_clean($Data));
				$this->db->escape($Data);
				redirect('Correctamente/Posteado');
				//header("Location". base_url() . "Correctamente");//arreglar esto				}
				}else
				{
					$Data = array('title' => 'Crear nuevo post');
					$this->load->view('guest/Head', $Data);
					$this->load->view("/guest/Navegacion");
					$Data = array('Post' => 'Nuevo post' ,'Descripcion' =>'Intente de nuevo');
					$this->load->view("/guest/Header",$Data);
					$this->load->helper("bootstrap_helper"); 
					$this->load->view("/usuarios/Nuevo");
					$this->load->view("/guest/Footer");
				}

		/*$File_name = $this->File->UploadImage('./public/img','No es posible subir la imagen');
			$Post['file_name'] = $File_name;
			$Bool = $this->Post->insert($Post);}*/
	
}

	public function userInsert()//subir el usuario a la base de datos
	{
		$this->load->model("Crear_usuario");
		$this->load->library('form_validation');
	//S	$this->load->library('Bcrypt');
		$this->form_validation->set_rules('usuario', 'usuario','required|is_unique[usuario.nom_usuario]');
		$this->form_validation->set_rules('password', 'password','required|matches[passwordver]');
		$this->form_validation->set_rules('passwordver', 'passwordver','required|matches[password]');
		$this->form_validation->set_rules('email', 'email','required|valid_email');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		if ($this->form_validation->run()== TRUE) {
			$Usuario = array(
			'nom_usuario' => htmlspecialchars($this->input->post('usuario')),
			'pass_usuario' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
			//'passwordver' =>$this->input->post('passwordver'),
			'mail_usuario' => htmlspecialchars($this->input->post('email')));
			$this->Crear_usuario->insert('usuario',$Usuario);
			//$Return = $this->input->post('usuario',$Usuario);
			header("Location:" . base_url(). "Correctamente");
		}
			else{
				$Data = array('title' => 'REGISTRARSE');
				$this->load->view('guest/Head', $Data);
				$this->load->view("/guest/Navegacion");
				$Data = array('Post' => 'Registro' ,'Descripcion' =>'Nuevo usuario');
				$this->load->view("/guest/Header",$Data);
				$this->load->helper("bootstrap_helper"); 
				$this->load->view("/usuarios/Registrar_usuario");
				$this->load->view("/guest/Footer");
			
				}
	
		}


	public function comment()//subir comentario a la base de datos
	{
		$this->load->model("Comentario");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('titulo', 'titulo','required');
		$this->form_validation->set_rules('contenido', 'contenido','required');
		if ($this->form_validation->run()== TRUE) {
			$Comentario = array(
				'nom_usuario' => $this->session->userdata['login']['nom_usuario'],
				'id_post' => $this->input->post('id_post'),
				'titulo_comentario' => htmlspecialchars($this->input->post('titulo')),
				'cont_comentario'=> htmlspecialchars($this->input->post('contenido')));
		$this->Comentario->insert('comentario',$this->security->xss_clean($Comentario));
		redirect("Correctamente/Comentado");
		}
		else{
				redirect("Correctamente/noComentado");
			
				}
		

		//$Comentario = $this->input->post();
		//$Bool = $this->Comentario->insert($Comentario);
		//'id_post'=>$this->input->post('id_post');
		/*if($Bool){
			header("Location:" . base_url(). "Contenido/post");
		}else{
			echo "No se pudo comentar el post";
		}*/
	}
}

?>
