<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	

	require 'vendor/autoload.php';
	use Mailgun\Mailgun;

class Correo{


public function sendMail(){


	$mg = new Mailgun("key-cc1286ac4a5c680c1dc3d515d4ae4c7f");
	$domain = "sandboxdf1e1a81144f41f089194ebe5d4c867c.mailgun.org";

	$mg->sendMessage($domain, array(
			'from' => 'postmaster@sandboxdf1e1a81144f41f089194ebe5d4c867c.mailgun.org',
			'to' => 'viescamaria3@gmail.com',
			'subject' => 'Comentario nuevo en tu post',
			'text' => 'Un usuario ha comentado en tu post'));
}


}