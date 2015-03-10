<?php
class UsersController extends BaseController
{
	
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	public function getIndex()
	{
		$my_id =Auth::user()->id;
		$level =Auth::user()->level;
		if ($level>=1)
		{
			$users = DB::table('users')->where('level', '<>', '1')->where('id','<>',$my_id)->get();
			return View::make('admin.usuarios')->with('users',$users);
		}else
		{
			return View::make('errors.acess_denied_ad');
		}
	}

	
	public function postCreate()
	{
		/*mensajes*/
		$mensajes=array(
			'required' => 'Campo requerido',
			'max' => 'Debe escribir mas Caracteres',
			'numeric' => 'Debe ser un numero',
			'min' => 'Supera el maximo caracteres',
			'email' => 'Debe Ingresar un Email',
			'unique' => 'El Correo ingresado ya esta registrado',
			);
		//validar reglas de inputs
		$rules=array(
			'name' => 'required|max:50',
			'last_name' => 'required|max:50',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8',
			'address' => 'required|max:50',
			'phone' => 'required|numeric|min:5',
			'username' => 'required|max:50',
			);
		$validator = Validator::make(Input::all(), $rules,$mensajes);
		if ($validator->fails())
		{
			/*return Redirect::back()->with_input()->with_errors($validator);*/
			 return Redirect::to('users#form_modal2')->withErrors($validator);
		}
		$password=Input::get('password');

		$user=new User;
		$user->name=Input::get('name');
		$user->last_name=Input::get('last_name');
		$user->email=Input::get('email');
		$user->address=Input::get('address');
		$user->phone=Input::get('phone');
		$user->username=Input::get('username');
		$user->password=Hash::make($password);
		$user->save();

		//redireccionar
		return Redirect::to('users')->with('status','ok_create');
	}
}
?>