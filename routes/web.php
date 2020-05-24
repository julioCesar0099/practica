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


Route::get('/','Auth\LoginController@showLoginForm');



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
       Route::post('roles','RolesController@store')->name('admin.roles.store');

       Route::get('roles/{role}','RolesController@edit')->name('admin.roles.edit');
       Route::put('roles/{role}','RolesController@update')->name('admin.roles.update');
       Route::delete('roles/{role}','RolesController@destroy')->name('admin.roles.destroy');

       
       
   });

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
