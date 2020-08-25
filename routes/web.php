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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/login', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth','cekRole:admin']],function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/kriteria', 'KriteriaController@index')->name('admin.kriteria.index');
	Route::get('/kriteria/create', 'KriteriaController@create')->name('admin.kriteria.create');
	Route::post('/kriteria/store', 'KriteriaController@store')->name('admin.kriteria.store');
	Route::get('/kriteria/{id}', 'KriteriaController@edit')->name('admin.kriteria.edit');
	Route::post('/kriteria/{id}/update', 'KriteriaController@update')->name('admin.kriteria.update');
	Route::get('/kriteria/{id}/destroy', 'KriteriaController@destroy')->name('admin.kriteria.destroy');


	Route::get('/subkriteria', 'SubkriteriaController@index')->name('admin.subkriteria.index');	
	Route::get('/subkriteria/create', 'SubkriteriaController@create')->name('admin.subkriteria.create');
	Route::post('/subkriteria/store', 'SubkriteriaController@store')->name('admin.subkriteria.store');
	Route::get('/subkriteria/{id}', 'SubkriteriaController@edit')->name('admin.subkriteria.edit');
	Route::post('/subkriteria/{id}/update', 'SubkriteriaController@update')->name('admin.subkriteria.update');
	Route::get('/subkriteria/{id}/destroy', 'SubkriteriaController@destroy')->name('admin.subkriteria.destroy');


	Route::get('/siswa', 'SiswaController@index')->name('admin.siswa.index');	
	Route::get('/siswa/create', 'SiswaController@create')->name('admin.siswa.create');
	Route::post('/siswa/store', 'SiswaController@store')->name('admin.siswa.store');
	Route::get('/siswa/{id}', 'SiswaController@edit')->name('admin.siswa.edit');
	Route::post('/siswa/{id}/update', 'SiswaController@update')->name('admin.siswa.update');
	Route::get('/siswa/{id}/destroy', 'SiswaController@destroy')->name('admin.siswa.destroy');
	Route::get('/siswa/{id}/show', 'SiswaController@show')->name('admin.siswa.show');


	Route::get('/tahunajaran', 'TahunAjaranController@index')->name('admin.tahunajaran.index');	
	Route::get('/tahunajaran/create', 'TahunAjaranController@create')->name('admin.tahunajaran.create');
	Route::post('/tahunajaran/store', 'TahunAjaranController@store')->name('admin.tahunajaran.store');
	Route::get('/tahunajaran/{id}', 'TahunAjaranController@edit')->name('admin.tahunajaran.edit');
	Route::post('/tahunajaran/{id}/update', 'TahunAjaranController@update')->name('admin.tahunajaran.update');
	Route::get('/tahunajaran/{id}/destroy', 'TahunAjaranController@destroy')->name('admin.tahunajaran.destroy');

	// untuk isi periode dan post semua 
	Route::get('/penilaian', 'PenilaianController@index')->name('admin.penilaian.index');
	Route::get('/penilaian/create', 'PenilaianController@create')->name('admin.penilaian.create');
	Route::post('/penilaian/store', 'PenilaianController@store')->name('admin.penilaian.store');
	Route::get('/penilaian/show/{id}', 'PenilaianController@show')->name('admin.penilaian.show');
	// untuk isi nilai subkriteria
	Route::get('/penilaian/create/{id}', 'PenilaianController@edit')->name('admin.penilaian.edit');
	// untuk proses hitung
	Route::post('/penilaian/hitung', 'PenilaianController@hitung')->name('admin.penilaian.hitung');
	// untuk lihat hasil penilaian
	Route::get('/hasilpenilaian', 'HasilPenilaianController@index')->name('admin.hasilpenilaian.index');
	Route::get('/hasilpenilaian/show/{id}', 'HasilPenilaianController@show')->name('admin.hasilpenilaian.show');
	Route::get('/hasilpenilaian/cetak/{id}', 'HasilPenilaianController@cetak')->name('admin.hasilpenilaians.cetak');

	//  users
	Route::get('/user', 'UserController@index')->name('admin.user.index');
	Route::get('/user/create', 'UserController@create')->name('admin.user.create');
	Route::get('/user/{id}', 'UserController@edit')->name('admin.user.edit');
	Route::post('/user/{id}/update', 'UserController@update')->name('admin.user.update');
});

Route::group(['middleware' => ['auth','cekRole:admin,kepsek']],function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/kriteria', 'KriteriaController@index')->name('admin.kriteria.index');
	Route::get('/subkriteria', 'SubkriteriaController@index')->name('admin.subkriteria.index');	
	Route::get('/siswa', 'SiswaController@index')->name('admin.siswa.index');
	Route::get('/siswa/{id}/show', 'SiswaController@show')->name('admin.siswa.show');
	Route::get('/tahunajaran', 'TahunAjaranController@index')->name('admin.tahunajaran.index');	

	Route::get('/hasilpenilaian', 'HasilPenilaianController@index')->name('admin.hasilpenilaian.index');
	Route::get('/hasilpenilaian/show/{id}', 'HasilPenilaianController@show')->name('admin.hasilpenilaian.show');
});


	


