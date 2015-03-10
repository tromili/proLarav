<?php
class ImgController extends BaseController
{
	
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	public function getIndex()
	{
		return View::make('errors.acess_denied_ad');
	}

	public function postImgslider()
		{
				
			DB::table('cms_sliders')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}	


	public function postImgcmp()
		{
				
			DB::table('ncmp')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}	
	public function postFotopro()
		{
				
			DB::table('profotos')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}	
	
	public function postGaler()
		{
				
			DB::table('cms_galeria')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}	

	public function postHorasd(){
		DB::table('cms_horarios')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
	}
	public function postInstru()
		{
				
			DB::table('cms_instructores')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}	
	public function postEvent()
		{
				
			DB::table('cm_eventos')
			->where('id','=',Input::get('ides'))
			->delete();
			return 'ok';
		  
		}
	

		
}
?>