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
       
       
       Route::get('tablas','TablaController@indexAsig')->name('admin.tablas.indexAsig');
       Route::delete('tablas/{tabla}','TablaController@destroy')->name('admin.tablas.destroy');
   
       Route::post('tablas','TablaController@store')->name('admin.tablas.store');
       Route::put('tablas/{tabla}','TablaController@update')->name('admin.tablas.update');
       Route::get('tablas/{tabla}','TablaController@edit')->name('admin.tablas.edit');
       
       

       
       Route::get('tablas/titulo/{tabla}','TituloController@titulo')->name('admin.tablas.titulo');
       Route::post('tablas/titulo/{tabla}','TituloController@tituloStore')->name('admin.tablas.titulo.store');
       Route::delete('tablas/titulo/{tabla}/{seccion}','TituloController@tituloDestroy')->name('admin.tablas.titulo.destroy');
       
       Route::get('tablas/subtitulo/{tabla}/{seccion}','TituloController@subtitulo')->name('admin.tablas.subtitulo');
       Route::delete('tablas/subtitulo/{tabla}/{subseccion}','TituloController@subtituloDestroy')->name('admin.tablas.subtitulo.destroy');
       Route::post('tablas/subtitulo/{tabla}/{seccion}','TituloController@subtituloStore')->name('admin.tablas.subtitulo.store');
       
       Route::get('tablas/inciso/{tabla}/{subseccion}','TituloController@inciso')->name('admin.tablas.inciso');
       Route::delete('tablas/inciso/{tabla}/{inciso}','TituloController@incisoDestroy')->name('admin.tablas.inciso.destroy');
       Route::post('tablas/inciso/{tabla}/{subseccion}','TituloController@incisoStore')->name('admin.tablas.inciso.store');
       
       Route::get('tablas/subinciso/{tabla}/{inciso}','TituloController@subinciso')->name('admin.tablas.subinciso');
       Route::delete('tablas/subinciso/{tabla}/{subinciso}','TituloController@subincisoDestroy')->name('admin.tablas.subinciso.destroy');
       Route::post('tablas/subinciso/{tabla}/{inciso}','TituloController@subincisoStore')->name('admin.tablas.subinciso.store');
       
       
       
    });

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registroPost','PostulantController@registroPost')->name('registroPost');
Route::get('/regPostulante/{id}','PostulantController@regPostulante')->name('regPostulante');
Route::post('/regPostulante', 'PostulantController@crear')->name('postulantes.crear');
Route::post('/registroPost', 'PostulantController@identificacion')->name('postulantes.identificacion');

Route::get('/carreras', 'Admin\CombocatoriaController@getCarreras');