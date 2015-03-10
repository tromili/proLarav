<?php
class FrontController extends BaseController
{
	
	public function __construct()
	{
		//$this->beforeFilter('auth');
	}
	public function getIndex()
	{
		$contacto = DB::table('cms_contacto')
			//  ->where('proyectos.id', '=', $id)
			  ->get();
		
		$hora = DB::table('cms_sede')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

		$fondo = DB::table('cms_fondos')
			->get();
	
		return View::make('front.index')->with('horarios',$hora)->with('conta',$contacto)->with('fond',$fondo);
		
	}
	public function getMyurl()
	{
		return View::make('front.index');
	}

	public function postContacto(){

		$destino;

		$contacto = DB::table('cms_contacto')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

		foreach ($contacto as $cont) {
			$destino = $cont->email;
		}
		
		$nombre=Input::get('nombre');
		$email=Input::get('email');
		$website=Input::get('website');
		$mensaje=Input::get('mensaje');

		$mail = $nombre.'\n'.$email.'\n'.$website.'\n'.$mensaje;
		//Titulo
		$titulo = "Contactenos bushido";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//dirección del remitente 
		$headers .= "From: ".$email."\r\n";
		//Enviamos el mensaje a info@geekytheory.com 
			
		$ace = mail($destino, $titulo, utf8_decode($mail), $headers);	
		

		return Redirect::to('index/')->with('status','Sumensaje fue enviado');

	}


}
?>