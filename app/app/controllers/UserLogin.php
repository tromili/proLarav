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

		public function logout(){

		    Session::flush();
		    return Redirect::to('login');
		}
	}
?>