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
		$Data = array('Post' => $Fila->titulo_post ,'Descripcion' =>$Fila->autor_post,'Fecha'=>$Fila->fecha_post);
		$this->load->view("/Posts/Header_post",$Data);
		$Data = array('Contenido' => $Fila->cont_post );
		$this->load->view("/guest/Post_vista",$Data);

		//$this->load->view("/guest/Footer");
		//$this->load->view("comentario");
	}
	public function nuevo() //crear un post nuevo
	{
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
		$Data = array('Post' => 'Registrox' ,'Descripcion' =>'Nuevo usuario');
		$this->load->view("/guest/Header",$Data);
		$this->load->helper("bootstrap_helper"); 
		$this->load->view("/usuarios/Registrar_usuario");
		$this->load->view("/guest/Footer");

}



	public function insert()
	{
			$Post = $this->input->post();
			$this->load->model("Imagen");
			$File_name = $this->Imagen->UploadImage('./public/img','No es posible subir la imagen');
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
		$Usuario = $this->input->Usuario();
		$Bool = $this->Usuario->userInsert($Usuario);
		if ($Bool){
				header("Location:". base_url() . "Perfil" );
			}else{
				header("Location:". base_url() . "Contenido/nuevo" );
			}
		}

	}

?>
