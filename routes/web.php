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

/*
Route::get('test', function(){
	// echo '<input type="hidden" name="_method" value="PUT">';
	// echo '<input type="hidden" name="_method" value="DELETE">';
});
*/

/*
Route::get('/', function(){
	$names = ['ashish', 'amit', 'kedar', 'anita'];
	$surnames = ['dhamala', 'neupane', 'alam', 'thapa'];
	return view('test') -> withNames($names)
						-> withSurnames($surnames);
});
*/

/*
Route::get('customer', function(){
	// $customer = App\Customer::first();
	// $customer = App\Customer::find(1);
	// $customer = App\Customer::find($id);

	// $names = ['fnames' => App\Customer::all()];
	// return view('test', $names);
});
*/

//Route::get('customer', 'CustomerController@customer_list');

// functions
function home_page($location="") 
{
	return "customers/" . $location;
}

Route::group(['middleware' => 'auth'], function(){

	Route::get('/', function(){
		// return view('welcome');
		return redirect('/customers');
	});

	// On the customers url, it executes customers_list method of controller CustomerController
	// Route::get('customers', 'CustomerController@customers_list');
	Route::get(home_page(), 'CustomerController@customers_list');

	Route::get(home_page('create'), 'CustomerController@create_customer')->name('customer_create');
	Route::post(home_page(), 'CustomerController@store');

	Route::get(home_page('{id}/edit'), 'CustomerController@edit_customer')->name('customer_edit');
	Route::put(home_page('{id}'), 'CustomerController@update');

	Route::delete(home_page('{id}'), 'CustomerController@destroy')->name('customer_delete');

});

Auth::routes();
Route::get('/home', 'HomeController@index');