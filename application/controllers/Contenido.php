<?php


class Contenido extends CI_Controller
{
	/*public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}*/

	public function Post($Name)//vista del post 
	{	
		
		$Fila = $this->Post->getPostByName($Name);
		$Data = array('title' =>$Fila->titulo_post);
		$Fila = $this->Comentario->getId($Name);
		$this->load->view("/guest/Head",$Data);
		$Data = array('app' => 'Blog');
		$this->load->view("/guest/Navegacion",$Data);
		$Data = array('Post' => $Fila->titulo_post ,
			'Descripcion' =>$Fila->autor_post,
			'Fecha'=>$Fila->fecha_post,
			'Imagen'=>$Fila->Imagen);
		$this->load->view("/Posts/Header_post",$Data);
		$Data = array('Contenido' => $Fila->cont_post );
		$this->load->view("/guest/Post_vista",$Data);
		
		//$this->load->view("/Posts/Comment");
		if ($this->session->userdata('login')){
		$this->load->view("/usuarios/Comentarios");}
		//$this->load->view("/guest/Footer");
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
			if (!$this->session->userdata('login')){
			 header("Location:" . base_url() );}

		//	$Post = $this->input->post();
		
			$this->load->model("File");
			$this->load->library('form_validation');
			$this->form_validation->set_rules('titulo', 'titulo','required');
			$this->form_validation->set_rules('contenido', 'contenido','required');
			if ($this->form_validation->run()== TRUE) {
			$Data = array(
				'titulo' => $this->input->post('titulo'),
				'contenido' =>$this->input->post('contenido'),
				'File_name' => $this->File->UploadImage('./public/img','No es posible subir la imagen'),
				'autor' => $this->input->post('autor'));
		/*	$File_name = $this->File->UploadImage('./public/img','No es posible subir la imagen');
			$Post['file_name'] = $File_name;
			$Bool = $this->Post->insert($Post);*/
			}
			if ($Bool) {
				header("Location:". base_url() . "Perfil" );
			}else{
				header("Location:". base_url() . "Contenido/nuevo" );
			}
		
	}

	public function userInsert()//subir el usuario a la base de datos
	{
		
		
		$this->load->model("Crear_usuario");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'usuario','required|is_unique[usuarios.nom_usuario]',
			 array(
			 	'required' => 'Ingresar un usuario',
			 	'is_unique' => 'Este usuario ya existe'));
		$this->form_validation->set_rules('password', 'password','required');
		$this->form_validation->set_rules('passwordver', 'passwordver','required|matches[password]');
		$this->form_validation->set_rules('email', 'email','required|valid_email');
		if ($this->form_validation->run()== TRUE) {
			$Data = array(
				'usuario' => $this->input->post('usuario'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email') 
				);
			$Return = $this->Post->insert('post',$Data);
		}
		$Bool = $this->Crear_usuario->insert($Return);
		if ($Bool){
				header("Location:". base_url() . "Registrar" );
			}else{
				header("Location:". base_url() . "Contenido/userNuevo" );
			}
		}


	public function comment()//subir comentario a la base de datos
	{
		$this->load->model("Comentario");
		$Comentario = $this->input->post();
		$Bool = $this->Comentario->insert($Comentario);
		if($Bool){
			header("Location:" . base_url(). "Contenido/post");
		}else{
			echo "No se pudo comentar el post";
		}
	}
}

?>
