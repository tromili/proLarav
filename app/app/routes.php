<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', function()
{
	return View::make('login');
});

Route::get('rcontra', function()
{

	return View::make('rcontra');
});


Route::post('login','UserLogin@user');
Route::get('logout', array('uses'=>'UserLogin@logout'));
Route::post('enviarc','UserLogin@enviarp');


//Rutas del sistema
/*Route::get('admin',array('before'=>'auth',function()
{
	return View::make('admin.index');
}));*/

//controladores del sistema
Route::controller('admin','AdminController');
Route::controller('imgs','ImgController');
Route::controller('/','FrontController');
?>