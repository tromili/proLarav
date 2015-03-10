<?php
class AdminController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	public function getIndex()
	{
		$my_id =Auth::user()->id;
		$level =Auth::user()->level;
			
			$slides = DB::table('cms_sliders')
			//  ->where('proyectos.id', '=', $id)
			  ->get();
			$sede = DB::table('cms_sede')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

			$dias = DB::table('cms_dias')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

			$contacto = DB::table('cms_contacto')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

			$infointro = DB::table('cms_estaticas')
			//  ->where('proyectos.id', '=', $id)
			  ->get();
			$gale = DB::table('cms_galeria')
			//  ->where('proyectos.id', '=', $id)
			  ->get();
			$instr = DB::table('cms_instructores')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

			$event = DB::table('cm_eventos')
			//  ->where('proyectos.id', '=', $id)
			  ->get();

			 $hora = DB::table('cms_horarios')
			//  ->where('proyectos.id', '=', $id)
			  ->get();


		if ($level>=1)
		{
			//return View::make('administrador.index');
			
		return View::make('administrador.index')->with('hor',$hora)->with('di',$dias)->with('se',$sede)->with('conta',$contacto)->with('even',$event)->with('instru',$instr)->with('slid',$slides)->with('textinf',$infointro)->with('galer',$gale);
		}else
		{
			return View::make('errors.acess_denied_ad');
		}


	}

	public function getAcdatos()
	{	
		$my_id =Auth::user()->id;
		 $registros = DB::table('users')
		  ->where('users.id', '=', $my_id)
		  ->get();
		
		return View::make('administrador.actudatos')->with('regist',$registros);

	}

	public function getMyurl()
	{
		
		return View::make('administrador.index');

	}
	public function getEditarslider($id)
	{	
		 $registros = DB::table('cms_sliders')
		  ->where('cms_sliders.id', '=', $id)
		  ->get();
		
		return View::make('administrador.editarslider')->with('regist',$registros);

	}

	public function getEditargaleria($id)
	{	
		 $registros = DB::table('cms_galeria')
		  ->where('cms_galeria.id', '=', $id)
		  ->get();
		
		return View::make('administrador.editargaleria')->with('regist',$registros);

	}
	public function getEditarentrenador($id)
	{	
		 $registros = DB::table('cms_instructores')
		  ->where('cms_instructores.id', '=', $id)
		  ->get();
		
		return View::make('administrador.editarentrenador')->with('entr',$registros);

	}

	

	public function postNfondo()
	 {
	  	$my_id =Auth::user()->id;
	    $fondo= Fondos::find(1);
		if(Input::file('foto') && Input::file('video')){
			$file=Input::file('foto');
		   $destinoPath=public_path().'/images/parallax/';
		   $urlimg=$file->getClientOriginalNAme();
		   $subir=$file->move($destinoPath,$file->getClientOriginalNAme());

		  

		   $fondo->fondo_conta = $urlimg;
		   $fondo->video = Input::get('video');
		   $fondo->save();
		}elseif(Input::file('foto')){
			
		   	$file=Input::file('foto');
		   $destinoPath=public_path().'/images/parallax/';
		   $urlimg=$file->getClientOriginalNAme();
		   $subir=$file->move($destinoPath,$file->getClientOriginalNAme());

		   $fondo->fondo_conta = $urlimg;
		    $fondo->save();

		}else{

		  	$fondo->video = Input::get('video');
		   	$fondo->save();
		}
		
		 return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postAcslide($id)
	 {
	  	$my_id =Auth::user()->id;
	    $pro= Sliders::find($id);
		if(Input::file('foto')){
			$file=Input::file('foto');
		   $destinoPath=public_path().'/images/slides/';
		   $urlimg=$file->getClientOriginalNAme();
		   $subir=$file->move($destinoPath,$file->getClientOriginalNAme());

		   $pro->texto = Input::get('texto');

		  
		   $pro->imagen = $urlimg;
		     $pro->save();
		}else{
			
		   	$pro->texto = Input::get('texto');

		    $pro->save();

		}
	
	   	return Redirect::to('admin/editarslider/'.$id);
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postAcuser()
	 {
	 	$my_id =Auth::user()->id;
	  
	    $pro = Usuarios::find($my_id);
		
		 	$pro->name = Input::get('nombre');
		   	$pro->last_name = Input::get('apellido');
		   	$pro->email = Input::get('email');
		   	$pro->empresa = Input::get('empresa');
		   	$pro->username = Input::get('usermane');
		   	$password = Input::get('password');
		   	$pro->password=Hash::make($password);
		    $pro->save();

	   return Redirect::to('admin/acdatos');
	  	  
	 }

	
	  public function postAcgaleri($id)
	 {
	  	$my_id =Auth::user()->id;
	    $pro= Galeria::find($id);
		if(Input::file('foto')){
			$file=Input::file('foto');
		   $destinoPath=public_path().'/images/galeria/';
		   $urlimg=$file->getClientOriginalNAme();
		   $subir=$file->move($destinoPath,$file->getClientOriginalNAme());

		   $pro->nombre = Input::get('nombre');
		   $pro->categoria = Input::get('categoria');

		  
		   $pro->foto = $urlimg;
		     $pro->save();
		}else{
			
		   	$pro->nombre = Input::get('nombre');
		   $pro->categoria = Input::get('categoria');

		    $pro->save();

		}
	
	   	return Redirect::to('admin/editargaleria/'.$id);
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	  public function postAcentrenado($id)
	 {
	  	$my_id =Auth::user()->id;
	    $pro= Instructores::find($id);
		if(Input::file('foto')){
			$file=Input::file('foto');
		   $destinoPath=public_path().'/images/instructores/';
		   $urlimg=$file->getClientOriginalNAme();
		   $subir=$file->move($destinoPath,$file->getClientOriginalNAme());

		   $pro->nombre = Input::get('nombre');
		   $pro->intro = Input::get('intro');

		  
		   $pro->foto = $urlimg;
		     $pro->save();
		}else{
			
		   	$pro->nombre = Input::get('nombre');
		   $pro->intro = Input::get('intro');

		    $pro->save();

		}
	
	   	return Redirect::to('admin/editarentrenador/'.$id);
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }


	public function postNslider()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoind = new Sliders();

	  if(Input::file('imagesl')){
		   $filesl=Input::file('imagesl');
		   $destinoPath=public_path().'/images/slides/';
		   $urlimgsl=$filesl->getClientOriginalNAme();
		   $subirsl=$filesl->move($destinoPath,$filesl->getClientOriginalNAme());
		   $nuevoind->imagen = $urlimgsl;
		   $nuevoind->texto = Input::get('texto');

		   $nuevoind->save();

		  
		}else{
			$nuevoind->texto = Input::get('texto');

		   $nuevoind->save();
		}
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postNhora()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoind = new Horarios();

	
			$nuevoind->id_sede = Input::get('sede');
			$nuevoind->id_dia = Input::get('dia');
			$nuevoind->hora_inicio = Input::get('horai');
			$nuevoind->hora_fin = Input::get('horaf');
			$nuevoind->leccion = Input::get('leccion');


		   $nuevoind->save();
	
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }


	public function postNcontac()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoconta = Contacto::find(1);

	  
		$nuevoconta->email = Input::get('email');
		$nuevoconta->texto_intro = Input::get('intro');
		$nuevoconta->anexo = Input::get('anexo');

		$nuevoconta->save();

	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }
	 public function postActextointro()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoind = Estaticas::find(1);

	  if(Input::file('fotointro')){
		   $filesl=Input::file('fotointro');
		   $destinoPath=public_path().'/images/fotointro/';
		   $urlimgsl=$filesl->getClientOriginalNAme();
		   $subirsl=$filesl->move($destinoPath,$filesl->getClientOriginalNAme());
		   $nuevoind->foto_introweb = $urlimgsl;
		   $nuevoind->titulo_intro = Input::get('titulointro');
		   $nuevoind->subtitulo_intro = Input::get('subtitulointro');
		   $nuevoind->intro_web = Input::get('introweb');
		   $nuevoind->contacto = Input::get('contacto');

		   $nuevoind->save();

		  
		}else{
		   $nuevoind->titulo_intro = Input::get('titulointro');
		   $nuevoind->subtitulo_intro = Input::get('subtitulointro');
		   $nuevoind->intro_web = Input::get('introweb');
		   $nuevoind->contacto = Input::get('contacto');

		   $nuevoind->save();
		}
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postNgaler()
	 {
	  $my_id =Auth::user()->id;


	   $nuevogale = new Galeria();

	  if(Input::file('foto')){
		   $filesl=Input::file('foto');
		   $destinoPath=public_path().'/images/galeria/';
		   $urlimgsl=$filesl->getClientOriginalNAme();
		   $subirsl=$filesl->move($destinoPath,$filesl->getClientOriginalNAme());
		   $nuevogale->foto = $urlimgsl;
		   $nuevogale->nombre = Input::get('nombre');
		   $nuevogale->categoria = Input::get('categoria');
		  
		   $nuevogale->save();

		  
		}else{
		   $nuevogale->nombre = Input::get('nombre');
		   $nuevogale->categoria = Input::get('categoria');
		  
		   $nuevogale->save();
		}
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postNentre()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoentre = new Instructores();

	  if(Input::file('foto')){
		   $filesl=Input::file('foto');
		   $destinoPath=public_path().'/images/instructores/';
		   $urlimgsl=$filesl->getClientOriginalNAme();
		   $subirsl=$filesl->move($destinoPath,$filesl->getClientOriginalNAme());
		   $nuevoentre->foto = $urlimgsl;
		   $nuevoentre->nombre = Input::get('nombre');
		   $nuevoentre->intro = Input::get('intro');
		  
		   $nuevoentre->save();

		  
		}else{
		   $nuevoentre->nombre = Input::get('nombre');
		   $nuevoentre->intro = Input::get('intro');
		  
		   $nuevoentre->save();
		}
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 public function postNevent()
	 {
	  $my_id =Auth::user()->id;


	   $nuevoevent = new Evento();

	  if(Input::file('foto')){
		   $filesl=Input::file('foto');
		   $destinoPath=public_path().'/images/eventos/';
		   $urlimgsl=$filesl->getClientOriginalNAme();
		   $subirsl=$filesl->move($destinoPath,$filesl->getClientOriginalNAme());
		   $nuevoevent->foto = $urlimgsl;


		   $nuevoevent->save();
		  
		}
	   return Redirect::to('admin/index/');
	  
	  // return View::make('errors.acess_denied_ad');
	  
	  
	 }

	 

}
?>