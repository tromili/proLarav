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
Route::post('login','UserLogin@user');
/*Route::get('logout', array('uses'=>'UserLogin@logout'));
Route::post('enviarc','UserLogin@enviarp');*/
Route::controller('admin','AdminController');
Route::controller('','FrontController');
?>