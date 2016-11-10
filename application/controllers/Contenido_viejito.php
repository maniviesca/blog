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
	{//public
		if (!$this->session->userdata['login'])header("Location:" . base_url() );
			$this->load->model('File');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('titulo', 'Titulo','trim|required|max_length[200]');
			$this->form_validation->set_rules('contenido', 'Contenido','trim|required');
			$this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('max_length','El campo %s tiene demasiados caractéres');
			//SUBIR IMAGEN///////////////////////////////////////////////$this->upload->data('file_name');
			$Imagen = 'Imagen';
			$config['upload_path'] = FCPATH."public/img";
			$config['file_name'] = $this->input->post('Imagen');
			$config['allowed_types'] = "gif|jpg|jpeg|png"; 
			$this->load->library('upload',$config);
			 if (!$this->upload->do_upload($Imagen)) 
				{//if thisuploaddoupload
					 	if ($this->form_validation->run()== TRUE) 
					 	{// if validation
							$Data = array(
							'titulo_post' =>htmlspecialchars(( $this->input->post('titulo'))),
							'cont_post' =>htmlspecialchars(($this->input->post('contenido'))),
							'Imagen' => $this->upload->data('file_name'),
							//'Imagen' => $this->upload->data('Imagen'),
							'nom_usuario' => $this->session->userdata['login']['nom_usuario']);
							
							if($this->Post->insert('post',$Data))
							{//if thispostinsertpostdata
								$this->db->escape($Data);
							$error= 'El post ha sido creado correctamente';
							$this->session->set_flashdata('posteado',$error);
								redirect('Perfil/index');
							}//if thispostinsertpostdata
							else
							{//else
								//flashdata
								//redirect
							}//else
						}//if validation
						else
						{
							$error= validation_errors();
							$this->session->set_flashdata('error',$error);
							redirect('Contenido/nuevo');
							/*$Data = array('title' => 'Crear nuevo post');
							$this->load->view('guest/Head', $Data);
							$this->load->view("/guest/Navegacion");
							$Data = array('Post' => 'Nuevo post' ,'Descripcion' =>'Intente de nuevo');
							$this->load->view("/guest/Header",$Data);
							$this->load->helper("bootstrap_helper"); 
							$this->load->view("/usuarios/Nuevo");
							$this->load->view("/guest/Footer");*/
						}
		            		echo $this->upload->display_errors();
		           			 return;
		       	}//if thisuploaddoupload
		        else
		        {
            	$Imagen = $this->upload->data('file_name');
			//SUBIR IMAGEN///////////////////////////////////////////////
				if ($this->form_validation->run()== TRUE) 
				{
				$Data = array(
				'titulo_post' =>htmlspecialchars(( $this->input->post('titulo'))),
				'cont_post' =>htmlspecialchars(($this->input->post('contenido'))),
				'Imagen' => $this->upload->data('file_name'),
				'nom_usuario' => $this->session->userdata['login']['nom_usuario']);
			
				if($this->Post->insert('post',$Data))
				{//if thispostinsert
					$this->db->escape($Data);
					$this->db->escape($Data);
							$error= 'El post ha sido creado correctamente';
							$this->session->set_flashdata('posteado',$error);
								redirect('Perfil/index');
				}//if thispostinsert
				else
				{//else
					//flashdata
					//redirect
				}//else
				//header("Location". base_url() . "Correctamente");//arreglar esto				}
				}
				else
				{//else
					$Data = array('title' => 'Crear nuevo post');
					$this->load->view('guest/Head', $Data);
					$this->load->view("/guest/Navegacion");
					$Data = array('Post' => 'Nuevo post' ,'Descripcion' =>'Intente de nuevo');
					$this->load->view("/guest/Header",$Data);
					$this->load->helper("bootstrap_helper"); 
					$this->load->view("/usuarios/Nuevo");
					$this->load->view("/guest/Footer");
				}//else
		/*$File_name = $this->File->UploadImage('./public/img','No es posible subir la imagen');
			$Post['file_name'] = $File_name;
			$Bool = $this->Post->insert($Post);}*/
	}//public
}
	public function userInsert()//subir el usuario a la base de datos
	{
		$this->load->model("Crear_usuario");
		$this->load->library('form_validation');
	//S	$this->load->library('Bcrypt');
		$this->form_validation->set_rules('nombre', 'Nombre','trim|required|strtolower');
		$this->form_validation->set_rules('apellido', 'Apellido','trim|required|strtolower');
		$this->form_validation->set_rules('usuario', 'Usuario','trim|required|is_unique[usuario.nom_usuario]|strtolower');
		$this->form_validation->set_rules('password', 'Contraseña','trim|required|matches[passwordver]|min_length[8]');
		$this->form_validation->set_rules('passwordver', 'Verificación de contraseña','trim|required');
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[usuario.mail_usuario]');
		$this->form_validation->set_rules('pregunta_uno', 'Pregunta uno','required');
		$this->form_validation->set_rules('respuesta_uno', 'Respuesta uno','trim|required|strtolower');
		$this->form_validation->set_rules('pregunta_dos', 'Pregunta dos','required');
		$this->form_validation->set_rules('respuesta_dos', 'Respuesta dos','trim|required|strtolower');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email','Ingresar una cuenta de correo válida');
		$this->form_validation->set_message('is_unique','Ya existe este %s');
		$this->form_validation->set_message('matches','Las contraseñas no coinciden');
		$this->form_validation->set_message('min_length','El campo %s tiene que tener al menos 8 caractéres');
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
				$error= validation_errors();
				$this->session->set_flashdata('insert_user',$error);
				redirect("Contenido/userNuevo");
			
				}
	
		}
	public function comment()//subir comentario a la base de datos
	{
		$this->load->model("Comentario");
		$this->load->library('form_validation');
		$this->load->library('Correo');
		$this->form_validation->set_rules('titulo', 'Titulo','trim|required');
		$this->form_validation->set_rules('contenido', 'Contenido','trim|required');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		if ($this->form_validation->run()== TRUE) {
			$Comentario = array(
				'nom_usuario' => $this->session->userdata['login']['nom_usuario'],
				'id_post' => $this->input->post('id_post'),
				'titulo_comentario' => htmlspecialchars($this->input->post('titulo')),
				'cont_comentario'=> htmlspecialchars($this->input->post('contenido')));
			//echo $this->input->post('id_post');
		$this->Comentario->insert('comentario',$Comentario);
		$this->correo->sendMail();
		$Post = $this->input->post('id_post');
				$error = "El post ha sido comentado correctamente";
				$this->session->set_flashdata('comment_corr',$error);
				redirect("Contenido/Post/".$Post);
		//redirect("Correctamente/Comentado");
		}
		else{
			$Post = $this->input->post('id_post');
				$error = validation_errors();
				$this->session->set_flashdata('comment',$error);
				redirect("Contenido/Post/".$Post);
			
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
		$this->session->set_flashdata('eliminado','Post eliminado correctamente');
		redirect("Perfil/index");
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
		$this->form_validation->set_rules('titulo', 'Titulo','trim|required');
		$this->form_validation->set_rules('contenido', 'Contenido','trim|required');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
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
		redirect("Perfil/index");}
		else
		{
			//$Id = $this->input->post('id_post');
			//$error= validation_errors();
			//$this->session->set_flashdata('no_actualizado',$error);
			$error= validation_errors();
			$this->session->set_flashdata('no_actualizado',$error);
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
			//redirect("Contenido/editar");
			//redirect("Contenido/notUpdated");
		}
			 	//$data['uploadError'] = $this->upload->display_errors();
           // echo $this->upload->display_errors();
            //return;
	}else{
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
		redirect("Perfil/index");}
		else
		{
			$error= validation_errors();
			$this->session->set_flashdata('no_actualizado',$error);
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
			//redirect("Contenido/editar");
			//redirect("Contenido/notUpdated");
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
		$this->load->model('Crear_usuario');
		$this->form_validation->set_rules('correo', 'Correo','trim|required|valid_email');
		$this->form_validation->set_message('required','Este campo es obligatorio');
		$this->form_validation->set_message('valid_email','Favor de ingresar un email válido');
		
		if ($this->form_validation->run() == TRUE)
		 {
				$Correo = htmlspecialchars($this->input->post('correo'));
				$Fila = $this->Crear_usuario->getUsuario($Correo);
			if($Correo == $Fila->mail_usuario){
				$Data = array('title' => 'Contraseña');
				$this->load->view('guest/Head', $Data);
				$this->load->view("/guest/Navegacion");
				$Data = array('Post' => 'Recuperar contraseña' ,'Descripcion' =>'Favor de contestar las siguientes preguntas correctamente y en mínusculas');
				$this->load->view("/guest/Header",$Data);
				$Correo = htmlspecialchars($this->input->post('correo'));
				$Fila = $this->Crear_usuario->getUsuario($Correo);
				$Data = array(
					'correo' => $Fila->mail_usuario,
					'pregunta_uno' => $Fila->pregunta_uno,
					'pregunta_dos' => $Fila->pregunta_dos
					);
				$this->load->view('/usuarios/Recuperar',$Data);
						
			}else{
				$mail = "Este correo electrónico no está registrado";
				$this->session->set_flashdata('correo_ele',$mail);
				redirect("Contenido/password");
			}
		}else{
			$error = validation_errors();
			$this->session->set_flashdata('error',$error);
			redirect("Contenido/password");
		}
		
	}
	public function verificar()//validar si los datos introducidos son correctos
	{
		$this->load->model('Crear_usuario');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nombre','trim|required');
		$this->form_validation->set_rules('lastname', 'Apellido','trim|required');
		$this->form_validation->set_rules('respuestauno', 'Respuesta uno','trim|required');
		$this->form_validation->set_rules('respuestados', 'Respuesta dos','trim|required');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		 if ($this->form_validation->run() == TRUE) 
		 {
		 	$Respuestauno = htmlspecialchars($this->input->post('respuestauno'));
		 	$Respuestados = htmlspecialchars($this->input->post('respuestados'));
		 	$Fila = $this->Crear_usuario->getUsuario($this->input->post('correo'));
		 	if($this->input->post('name') == $Fila->nombre && $this->input->post('lastname') == $Fila->apellido && password_verify($Respuestauno,$Fila->respuesta_uno) && password_verify($Respuestados,$Fila->respuesta_dos))
		 	{
		 		$Data = array('title' => 'Contraseña');
				$this->load->view('guest/Head', $Data);
				$this->load->view("/guest/Navegacion");
				$Data = array('Post' => 'Cambiar contraseña' ,'Descripcion' =>'Ingrese el correo electronico con el que se registro y la contraseña nueva');
				$this->load->view("/guest/Header",$Data);
				$Data = array (
					'name' => $this->input->post('name'),
					'lastname' => $this->input->post('lastname'),
					'respuestauno' => $this->input->post('respuestauno'),
					'respuestados' => $this->input->post('respuestados'),
					);
				$this->load->view("/usuarios/Cambiarpass",$Data);
				$this->load->view("/guest/Footer");
		 	}
		 }else{
		 	$error = validation_errors();
			$this->session->set_flashdata('verificar',$error);
			$Fila = $this->Crear_usuario->getUsuario($this->input->post('correo'));
			$Data = array('title' => 'Contraseña');
				$this->load->view('guest/Head', $Data);
				$this->load->view("/guest/Navegacion");
				$Data = array('Post' => 'Recuperar contraseña' ,'Descripcion' =>'Favor de contestar las siguientes preguntas correctamente');
				$this->load->view("/guest/Header",$Data);
			$Data = array(
					'correo' => $Fila->mail_usuario,
					'pregunta_uno' => $Fila->pregunta_uno,
					'pregunta_dos' => $Fila->pregunta_dos
					);
				$this->load->view('/usuarios/Recuperar',$Data);
				$this->load->view("/guest/Footer");
		 	//redirect("Contenido/recuperar");
		 }
	}
}
?>