<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**(Route::get('/', function () {
    return view('welcome');
});**/
Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data


Route::group(['middleware'=>'auth'], function(){
  Route::resource('akun','ControllerAkun');
  Route::get('/', function(){
    return redirect('/jurnal/create');
  });
  Route::resource('jurnal','ControllerJurnal');
  Route::get('bukubesar', 'ControllerJurnal@bukubesar');
  Route::get('neraca', 'ControllerNeraca@index');
  //Route::get('find','ControllerAkun@autocomplete');
  Route::get('test', 'ControllerReff@get_no');
  Route::get('logout','ControllerAuth@logout');
  Route::get('find_a', 'ControllerAkun@search');
  Route::get('test2', 'ControllerAkun@test2');
  Route::get('getakundata','ControllerAkun@data_all');
  Route::get('hapusakun/{id}', 'ControllerAkun@destroy');
  Route::get('show_neraca','ControllerNeraca@shown');
  Route::get('laba_rugi','ControllerLabarugi@laba_rugi');
  Route::resource('departemen', 'ControllerDepartemen');
  //testing
  Route::get('all', 'ControllerPinjaman@testing');
  

  Route::get('getallptk','ControllerPtk@data_all');
  Route::get('ptk_search','ControllerPtk@search');
  Route::resource('ptk', 'ControllerPtk');

  Route::resource('pinjaman', 'ControllerPinjaman');

  Route::resource('pembayaran','ControllerPembayaran');
  Route::get('riwayat','ControllerPembayaran@Riwayat');
  Route::get('rekappotongan', 'ControllerRekapHutang@index');

});
Route::get('login','ControllerAuth@login');
Route::post('login','ControllerAuth@postLogin');
Route::get('register','ControllerAuth@register');
Route::post('register','ControllerAuth@postRegister');
