<?php
	class UserLogin extends BaseController
	{
		
		public function user(){
			$userdata=array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			if (Auth::attempt($userdata))
			{
				return Redirect::to('admin');
			}
			else
			{
				Session::flush();
				return Redirect::to('login')->with('login_error',true)->with('status','Datos incorrectos');
			}
		}

		


		public function enviarp(){
			$email = Input::get('email');
			$registro = DB::table('users')
				//  ->where('proyectos.id', '=', $id)
				 ->get();
			foreach ($registro as $key) {
				if($key->email == $email){
					$pass = 'bushido15';
					$pro= User::find($key->id);
					$pro->password=Hash::make($pass);
					$pro->save();

					$destino = $key->email;
					
					$email = 'admin@bushido.com';

					$mail = 'Su pasword es:'.$pass;
					//Titulo
					$titulo = "Recuperar contraseña";
					//cabecera
					$headers = "MIME-Version: 1.0\r\n"; 
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					//dirección del remitente 
					$headers .= "From: ".$email."\r\n";
					//Enviamos el mensaje a info@geekytheory.com 
						
					$ace = mail($destino, $titulo, utf8_decode($mail), $headers);	
					

		//return Redirect::to('index/')->with('status','Sumensaje fue enviado');
				
					return Redirect::to('rcontra')->with('status','Sumensaje fue enviado');
				}
				else{
					
					return Redirect::to('rcontra')->with('status','Error correo no entrado');
				}
			}

		}
		

		public function logout(){

		    Session::flush();
		    return Redirect::to('login');
		}
	}
?>