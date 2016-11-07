<?php
if(!defined('BASEPATH'))
	exit('No direct script acces allowed');
class Contenido extends CI_Controller
{
	/*public function __construct()
	{
		parent::__construct();
	
	}*/
	public function Post($Name = NULL)//vista del post 
	{	
		if(is_null($Name)) redirect('/');
		$Data = $this->Post->getPostByName($Name);
		if($Data!=false){
		$this->load->model("Comentario");
		$Fila = $this->Post->getPostByName($Name);
		
		$Data = array('title' =>$Fila->titulo_post);
		$this->load->view("/guest/Head",$Data);
		$Data = array('app' => 'Blog');
		$this->load->view("/guest/Navegacion",$Data);
		$Data = array(
			'Post' => $Fila->titulo_post ,
			'Descripcion' =>$Fila->nom_usuario,
			'Fecha'=>$Fila->fecha_post,
			'Imagen'=>$Fila->Imagen);
		$this->load->view("/Posts/Header_post",$Data);
		$Data = array(
		'Contenido' => $Fila->cont_post,
		'Usuario' =>$Fila->nom_usuario, 
		'Imagen'=>$Fila->Imagen);
		$this->load->view("/guest/Post_vista",$Data);
		$Comentarios = $this->Comentario->getPostId($Name);
		$Data = array(
			'Consulta'=>$Comentarios);
		$this->load->view("/Posts/Comentario_vista",$Data);
		if ($this->session->userdata('login')){
		$this->load->view("/usuarios/Comentarios");}else{
			$this->load->view("Mensaje");
		}
		$this->load->view("/guest/Footer");
		//$Id = $this->uri->segment(3);
	}else{echo "no se encontro la pagina";}
}
	
	public function nuevo() //crear un post nuevo
	{
		if (!$this->session->userdata('login')){
			 redirect("/");
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
		if (!$this->session->userdata['login'])header("Location:" . base_url() );
		 
		//	$Post = $this->input->post();
		//	var_dump($this->session->userdata('nom_usuario'));exit;
			$this->load->model('File');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('titulo', 'titulo','trim|required');
			$this->form_validation->set_rules('contenido', 'contenido','trim|required');
			$this->form_validation->set_message('required','Este campo es obligatorio');
				
			//SUBIR IMAGEN///////////////////////////////////////////////$this->upload->data('file_name');
			$Imagen = 'Imagen';
			$config['upload_path'] = FCPATH."public/img";
			$config['file_name'] = $this->input->post('Imagen');
			$config['allowed_types'] = "gif|jpg|jpeg|png"; 
			$this->load->library('upload',$config);
			 if (!$this->upload->do_upload($Imagen)) {
			 	if ($this->form_validation->run()== TRUE) {
				$Data = array(
				'titulo_post' =>htmlspecialchars(( $this->input->post('titulo'))),
				'cont_post' =>htmlspecialchars(($this->input->post('contenido'))),
				'Imagen' => $this->upload->data('file_name'),
				//'Imagen' => $this->upload->data('Imagen'),
				'nom_usuario' => $this->session->userdata['login']['nom_usuario']);
			

				if($this->Post->insert('post',$Data)){
					$this->db->escape($Data);
					redirect('Correctamente/Posteado');
				}else{
					//flashdata
					//redirect
				}

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

			 	//$data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;}else{
            	$Imagen = $this->upload->data('file_name');
			//SUBIR IMAGEN///////////////////////////////////////////////
				if ($this->form_validation->run()== TRUE) {
				$Data = array(
				'titulo_post' =>htmlspecialchars(( $this->input->post('titulo'))),
				'cont_post' =>htmlspecialchars(($this->input->post('contenido'))),
				'Imagen' => $this->upload->data('file_name'),
				//'Imagen' => $this->upload->data('Imagen'),
				'nom_usuario' => $this->session->userdata['login']['nom_usuario']);
			

				if($this->Post->insert('post',$Data)){
					$this->db->escape($Data);
					redirect('Correctamente/Posteado');
				}else{
					//flashdata
					//redirect
				}

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
}
	public function userInsert()//subir el usuario a la base de datos
	{
		$this->load->model("Crear_usuario");
		$this->load->library('form_validation');
	//S	$this->load->library('Bcrypt');
		$this->form_validation->set_rules('nombre', 'nombre','trim|required');
		$this->form_validation->set_rules('apellido', 'apellido','trim|required');
		$this->form_validation->set_rules('usuario', 'usuario','trim|required|is_unique[usuario.nom_usuario]');
		$this->form_validation->set_rules('password', 'password','trim|required|matches[passwordver]');
		$this->form_validation->set_rules('passwordver', 'passwordver','trim|required');
		$this->form_validation->set_rules('email', 'email','trim|required|valid_email|is_unique[usuario.mail_usuario]');
		$this->form_validation->set_rules('pregunta_uno', 'pregunta_uno','required');
		$this->form_validation->set_rules('respuesta_uno', 'respuesta_uno','trim|required');
		$this->form_validation->set_rules('pregunta_dos', 'pregunta_dos','required');
		$this->form_validation->set_rules('respuesta_dos', 'respuesta_dos','trim|required');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		if ($this->form_validation->run()== TRUE) {
			$Usuario = array(
				'nombre' =>htmlspecialchars($this->input->post('nombre')),
				'apellido' => htmlspecialchars($this->input->post('apellido')),
			'nom_usuario' => htmlspecialchars($this->input->post('usuario')),
			'pass_usuario' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
			//'passwordver' =>$this->input->post('passwordver'),
			'mail_usuario' => htmlspecialchars($this->input->post('email')),
			'pregunta_uno' =>$this->input->post('pregunta_uno'),
			'respuesta_uno' => password_hash(htmlspecialchars($this->input->post('respuesta_uno')),PASSWORD_BCRYPT),
			'pregunta_dos' =>$this->input->post('pregunta_dos'),
			'respuesta_dos' => password_hash(htmlspecialchars($this->input->post('respuesta_dos')),PASSWORD_BCRYPT));
			$this->Crear_usuario->insert('usuario',$Usuario);
			//$Return = $this->input->post('usuario',$Usuario);
			redirect("Correctamente");
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
		$this->load->library('Correo');
		$this->form_validation->set_rules('titulo', 'titulo','trim|required');
		$this->form_validation->set_rules('contenido', 'contenido','trim|required');
		if ($this->form_validation->run()== TRUE) {
			$Comentario = array(
				'nom_usuario' => $this->session->userdata['login']['nom_usuario'],
				'id_post' => $this->input->post('id_post'),
				'titulo_comentario' => htmlspecialchars($this->input->post('titulo')),
				'cont_comentario'=> htmlspecialchars($this->input->post('contenido')));
			//echo $this->input->post('id_post');
		$this->Comentario->insert('comentario',$Comentario);
		$this->correo->sendMail();
		redirect("Correctamente/Comentado");
		}
		else{
				redirect("Correctamente/noComentado");
			
				}
	}
	public function eliminar()//eliminar post
	{
		$this->load->model('Post');
		$this->load->model('Comentario');
		//$Id = $this->uri->segment(2);
		$Id = $this->input->post('id_post');
		$this->Post->delete($Id);
		$this->Comentario->delete($Id);
		//echo $Id;
		redirect("Correctamente/Eliminado");
	}
	public function deleteComment()//eliminar comentario
	{
		$this->load->model('Comentario');
		$Id =$this->input->post('id_comentario');
		$this->Comentario->deleteComment($Id);
		redirect("/");
	}
	public function editar()//vista de actualizar post
	{
		if (!$this->session->userdata('login')){
			 header("Location:" . base_url() );
		}
		$this->load->model('Post');
		$Data = array('title' => 'Crear nuevo post');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Editar post' ,'Descripcion' =>'');
		$this->load->view("/guest/Header",$Data);
		$this->load->helper("bootstrap_helper"); 
		$Id = $this->input->post('id_post');
		$Fila = $this->Post->getPostByName($Id);
		$Data = array(
			'Id' => $Fila->id_post,
			'Titulo' => $Fila->titulo_post,
			'Contenido' =>$Fila->cont_post,
			'Imagen' => $Fila->Imagen);
		$this->load->view("/usuarios/Editar",$Data);
		$this->load->view("/guest/Footer");
	}
public function actualizar()//actualizar post
	{
		if (!$this->session->userdata['login']){
		 redirect("/");}
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('titulo', 'titulo','trim|required');
		$this->form_validation->set_rules('contenido', 'contenido','trim|required');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		//SUBIR IMAGEN///////////////////////////////////////////////$this->upload->data('file_name');
			$Imagen = 'Imagen';
			$config['upload_path'] = FCPATH."public/img";
			$config['file_name'] = $this->input->post('Imagen');
			$config['allowed_types'] = "gif|jpg|jpeg|png"; 
			$this->load->library('upload',$config);
			 if (!$this->upload->do_upload($Imagen)) {
			 if ($this->form_validation->run() == TRUE) {
			$Id = $this->input->post('id_post');
		$Data = array(
				'titulo_post' =>htmlspecialchars($this->input->post('titulo')),
				'cont_post' =>htmlspecialchars($this->input->post('contenido')),
				'Imagen' =>$this->upload->data('file_name'));
		$this->Post->actualizar($Id,$Data);
		$this->session->set_flashdata('correcto','Post actualizado correctamente');
		redirect("Correctamente/update");}
		else
		{
			redirect("Contenido/notUpdated");
		}
			 	//$data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;}else{
            	$Imagen = $this->upload->data('file_name');
			//SUBIR IMAGEN///////////////////////////////////////////////
		if ($this->form_validation->run() == TRUE) {
			$Id = $this->input->post('id_post');
		$Data = array(
				'titulo_post' =>htmlspecialchars($this->input->post('titulo')),
				'cont_post' =>htmlspecialchars($this->input->post('contenido')),
				'Imagen' =>$this->upload->data('file_name'));
		$this->Post->actualizar($Id,$Data);
		$this->session->set_flashdata('correcto','Post actualizado correctamente');
		redirect("Correctamente/update");}
		else
		{
			redirect("Contenido/notUpdated");
		}
		}
	}
	public function password()//vista recuperar contraseña
	{
		$Data = array('title' => 'Contraseña');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Recuperar contraseña' ,'Descripcion' =>'');
		$this->load->view("/guest/Header",$Data);
		//$this->load->helper("bootstrap_helper"); 
		$this->load->view("/usuarios/Password");
		$this->load->view("/guest/Footer");
	}
	public function recuperar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('correo', 'correo','trim|required');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		//$this->form_validation->set_message('matches','No existe');
		 if ($this->form_validation->run() == TRUE)
		 {
		$this->load->model('Crear_usuario');
		$Data = array('title' => 'Contraseña');
		$this->load->view('guest/Head', $Data);
		$this->load->view("/guest/Navegacion");
		$Data = array('Post' => 'Recuperar contraseña' ,'Descripcion' =>'Favor de contestar las siguientes preguntas correctamente');
		$this->load->view("/guest/Header",$Data);
		$Correo = $this->input->post('correo');
		$Fila = $this->Crear_usuario->getUsuario($Correo);
		$Data = array(
			'correo' => $Fila->mail_usuario,
			'pregunta_uno' => $Fila->pregunta_uno,
			'pregunta_dos' => $Fila->pregunta_dos
			);
		$this->load->view('/usuarios/Recuperar',$Data);
	
		}
		//if($Correo != null) redirect('/');
	}
	public function verificar()//validar si los datos introducidos son correctos
	{
		$this->load->model('Crear_usuario');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name','trim|required');
		$this->form_validation->set_rules('lastname', 'lastname','trim|required');
		$this->form_validation->set_rules('respuestauno', 'respuestauno','trim|required');
		$this->form_validation->set_rules('respuestados', 'respuestados','trim|required');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		 if ($this->form_validation->run() == TRUE) 
		 {
		 	$Respuestauno = $this->input->post('respuestauno');
		 	$Respuestados = $this->input->post('respuestados');
		 	$Fila = $this->Crear_usuario->getUsuario($this->input->post('correo'));
		 	if($this->input->post('name') == $Fila->nombre && $this->input->post('lastname') == $Fila->apellido && password_verify($Respuestauno,$Fila->respuesta_uno) && password_verify($Respuestados,$Fila->respuesta_dos))

		 	{
		 		$Data = array('title' => 'Contraseña');
				$this->load->view('guest/Head', $Data);
				$this->load->view("/guest/Navegacion");
				$Data = array('Post' => 'Cambiar contraseña' ,'Descripcion' =>'Ingrese el correo electronico con el que se registro y la contraseña nueva');
				$this->load->view("/guest/Header",$Data);
				//$this->load->helper("bootstrap_helper"); 
				$this->load->view("/usuarios/Cambiarpass");
				$this->load->view("/guest/Footer");

		 	}else echo "muy mal";
redirect("Correctamente/password");

		 }else redirect("Correctamente/formulario");
	}
}
?>