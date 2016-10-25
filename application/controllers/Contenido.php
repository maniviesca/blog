<?php


class Contenido extends CI_Controller
{

	public function Post($Name)
	{
		
		$Fila = $this->Post->getPostByName($Name);
		$Data = array('title' =>$Fila->titulo_post);
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
		//$Comment = $this->comentario->getId($Id);
		//$Data = array('Id' => $Comment->titulo_comentario);
		
		if ($this->session->userdata('login')){
		$this->load->view("/usuarios/Comentarios");}


		//$this->load->view("/guest/Footer");
		//$this->load->view("comentario");
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
	
public function userNuevo()
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



	public function insert()
	{
			if (!$this->session->userdata('login')){
			 header("Location:" . base_url() );
		}
			$Post = $this->input->post();
			$this->load->model("File");
			$File_name = $this->File->UploadImage('./public/img','No es posible subir la imagen');
			$Post['file_name'] = $File_name;
			$Bool = $this->Post->insert($Post);
			if ($Bool) {
				header("Location:". base_url() . "Perfil" );
			}else{
				header("Location:". base_url() . "Contenido/nuevo" );
			}
	}

	public function userInsert()
	{
		$this->load->model("Crear_usuario");
		$Usuario = $this->input->post();
		$Bool = $this->Crear_usuario->insert($Usuario);
		if ($Bool){
				header("Location:". base_url() . "Registrar" );
			}else{
				header("Location:". base_url() . "Contenido/nuevo" );
			}
		}

	public function comment()
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
