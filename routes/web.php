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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//middleware default web , memeriksa session csrf , kernel http , dll 
Route::group(['middleware' => 'web'], function()
{
	Route::auth();
});

//url ini di akses oleh user yang sudah login
Route::group(['middleware' => ['web' , 'auth']], function()
{
	Route::get('/home','HomeController@index');
	//Route::get('/profile', 'HomeController@profile');

	// url untuk memanage user
	Route::get('/user/tambah', 'Admin\users@formTambah');
	Route::post('/user/prosesadd', 'Admin\users@create');
	Route::get('/user/list','Admin\users@index');
	Route::get('/user/delete/{data}', 'Admin\users@destroy');
	// |* akhir *| //

	// url untuk memangae bahan
	Route::get('/bahan/list', 'Admin\bahan@index');
	Route::get('/bahan/tambah', 'Admin\bahan@formTambah');
	Route::post('/bahan/prosesadd', 'Admin\bahan@create');
	Route::get('/bahan/delete/{data}', 'Admin\bahan@destroy');
	// |* akhir *|

	// url untuk memanage stock
	Route::get('/stock/list', 'Admin\stock@index');
	Route::get('/stock/tambah', 'Admin\stock@formTambah');
	Route::post('/stock/prosesadd', 'Admin\stock@create');
	// |* akhir *|

	// url untuk memanage item
	Route::get('/item/list', 'Admin\item@index');
	Route::get('/item/tambah', 'Admin\item@formTambah');
	Route::post('/item/prosesadd', 'Admin\item@create');
	// |* akhir *|

	// utl untuk memanage komposisi
	Route::get('/komposisi/list/{data}', 'Admin\komposisi@index');
	Route::get('/komposisi/tambah/{data}', 'Admin\komposisi@formTambah');
	Route::post('/komposisi/prosesadd', 'Admin\komposisi@create');
	Route::get('/komposisi/delete/{data}', 'Admin\komposisi@destroy');
	// |* akhir *|

	//url untuk melihat list penjualan
	Route::get('/penjualan','Admin\penjualan@index');
	// |* akhir *|

	// url untuk kasir
	Route::post('/chart/prosesadd', 'Kasir\transaksi@create');
	Route::get('/chart/delete/{data}', 'Kasir\transaksi@destroy');
	Route::post('/kasir/bayar', 'Kasir\pembayaran@create');
	// |* akhir *|


	Route::get('/', function()
	{
		if (Auth::user()->user == 1) 
		{
			//user akses untuk admin
			$bahan = DB::table('pembayaran')->where('date_pembayaran','=',date('Y-m-d'))->get();
			$count = count($bahan);
			//$penjualan = penjualan::all();
			//print_r($bahan);
			return view('admin/index')->with('pemasukan',$bahan)->with('penjualan',$count);
		}else
		{
			//user akses untuk kasir
			$chart = DB::table('chart')->join('users','chart.id_user','=','users.id')->join('item','item.id_item','=','chart.id_item')->where('chart.status','null')->get();
	        $total = 0;
	        $count = 0;
	        foreach ($chart as $data) {
	        	$count = $data->banyak_beli;
	            $total = $total + ($data->harga_item * $count ); 
	        }
			$x = DB::table('item')->get();
			return view('cashier/index')->with('data',$x)->with('total',$total);
		}
	});
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// url di akses untuk user yang telah login sebagai admin
Route::get('admin', ['middleware' => ['web','auth','admin'], function()
{
	return view('admin/index');
}]);
