<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','InicioController@index');
Route::get('/ayuda', 'ControllerMail@index');
Route::post('/send', 'ControllerMail@send');
Route::get('/login','Auth\LoginController@showLoginForm');

Route::group([
   'prefix'=> 'admin',
   'namespace'=> 'Admin',
   'middleware'=>'auth'],

   function(){
       Route::get('/','DashboardController@index')->name('dashboard');
       Route::get('/combocatorias','CombocatoriaController@index')->name('admin.combocatorias.index');
       Route::get('combocatorias/create','CombocatoriaController@create')->name('admin.combocatorias.create');
       Route::post('combocatorias','CombocatoriaController@store')->name('admin.combocatorias.store');
       Route::delete('combocatorias/{combocatoria}','CombocatoriaController@destroy')->name('admin.combocatorias.destroy');
       
       route::get('roles','RolesController@index')->name('admin.roles.index');
       route::get('roles/create','RolesController@create')->name('admin.roles.create');

       route::get('roles/asignar','RolesController@asignar')->name('admin.roles.asignar');

       route::get('roles/asignar/{user}','RolesController@asignar2')->name('admin.roles.asignar2');
       route::put('roles/asignar/{user}','RolesController@asignar3')->name('admin.roles.asignar3');
       route::put('roles/quitar/{user}','RolesController@quitar')->name('admin.roles.quitar');




       Route::post('roles','RolesController@store')->name('admin.roles.store');
       Route::get('roles/{role}','RolesController@edit')->name('admin.roles.edit');
       Route::put('roles/{role}','RolesController@update')->name('admin.roles.update');
       Route::delete('roles/{role}','RolesController@destroy')->name('admin.roles.destroy');

       Route::resource('personas', 'PersonasController');
       
       
   });

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registroPost/{convocatoria}','PostulantController@registroPost')->name('registroPost');
Route::get('/regPostulante/{codigoS}/{convocatoria}','PostulantController@regPostulante')->name('regPostulante');
Route::post('/regPostulante/{codigoS}/{convocatoria}','PostulantController@crear')->name('postulantes.crear');
Route::post('/registroPost/{convocatoria}', 'PostulantController@identificacion')->name('postulantes.identificacion');
Route::get('/habPostulante','PostulantController@habPostulante')->name('postulantes.habPostulante');
Route::get('{id}/habilitacion','PostulantController@habilitar');
Route::get('{id}/deshabilitacion','PostulantController@deshabilitar');
Route::get('/listaHab','PostulantController@listaHab')->name('postulantes.listaHab');
Route::put('postulante/{listaP}','PostulantController@observacion')->name('postulante.observacion');

