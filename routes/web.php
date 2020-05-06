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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(); 


Route::get('/home', 'HomeController@index')->name('home');
   
Route::get('/dashboard', 'dashController@index')->name('dashboard.dash');

Route::resource('users','userController');

Route::resource('usulan', 'usulanController');

Route::resource('opd', 'opdController');

Route::resource('pokja', 'pokjaController');

Route::resource('profil', 'profilController');

Route::resource('stugas', 'tugasController');

Route::resource('datapokja', 'datapokjaController');

Route::resource('pembuktian', 'pembuktianController');

Route::resource('hasillelang', 'hasillelangController');

Route::resource('spj', 'spjController');

//route::get('/pokja/{id}/tambahdatapokja','datapokjaController@tambahdatapokja')->name('datapokja.tambahdatapokja');

Route::get('/buatpaket','tugasController@lpaket')->name('stugas.lpaket');

route::get('/buatpaket/{id}/view','tugasController@view')->name('stugas.view');

route::get('/buatpaket/{id}/tambahpaket','tugasController@buatpaket')->name('stugas.buatpaket');

route::get('/usulan/{id}/download','usulanController@download')->name('usulan.download');

route::get('/pembuktian/{id}/download','pembuktianController@download')->name('pembuktian.download');

Route::get('/stugas/{id}/cetak_pdf','tugasController@cetak_pdf')->name('stugas.cetak_pdf');

Route::get('/hasillelang/json', 'hasillelangController@json')->name('hasillelang.json');

Route::get('/laporanulp/usulan','laporanulpController@lapusulan')->name('laporanulp.usulanlelang');

Route::get('/laporanulp/proses','laporanulpController@lapproses')->name('laporanulp.proseslelang');

Route::get('/laporanulp/cetak','laporanulpController@export_excel')->name('laporanulp.cetak');

Route::get('/Pokja/Daftarpaket','gruppokjaController@index')->name('pokjaview.daftarpaket');

Route::get('/Pokja/Dashboard','gruppokjaController@dash')->name('pokjaview.dash');

Route::get('/Pokja/Daftarpaket/{id}/detail','gruppokjaController@detail')->name('pokjaview.detail');
