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

Route::middleware('auth')->group(function(){

	// Authentification
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/account', 'AccountController@index')->name('account');
	Route::get('/account', 'AccountController@modify')->name('accountModify');
	Route::get('/renameUser/{id}', 'AccountController@renameUser')->name('renameUser');
	Route::get('/logout', 'AccountController@logout')->name('logout');
	Route::get('/send', 'AccountController@newPassword')->name('newPassword');
	Route::get('/reset', 'AccountController@newPasswordPage')->name('newPasswordPage');
	// Administration
	Route::get('/admin/groups', 'AdminController@groups')->name('groups');
	Route::get('/admin/groups/delete/{id}', 'AdminController@deleteRole')->name('deleteRole');
	Route::get('/admin/groups/manage/{id}', 'AdminController@manageRole')->name('manageRole');
	Route::get('/admin/users', 'AdminController@manageUsers')->name('users');
	Route::get('/admin/users/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
	Route::get('/admin/role/add', 'AdminController@addRole')->name('addRole');
	Route::get('/admin/role/view', 'AdminController@viewRole')->name('viewRole');
	Route::get('/admin/users/add/role/{id}', 'AdminController@addRoleToUser')->name('addRoleToUser');
	Route::get('/admin/users/delete/role/{id}', 'AdminController@deleteRoleToUser')->name('deleteRoleToUser');
	// Comptability
		// Liasses
	Route::get('/compta/listLiasse', 'ComptaController@manageLiasse')->name('manageLiasse');
	Route::get('/compta/liasse/{id}', 'ComptaController@modifyLiasse')->name('modifyLiasse');
	Route::get('/compta/listLiasse/delete/{id}', 'ComptaController@deleteLiasse')->name('deleteLiasse');
		// Discounts (remises)
	Route::get('/discount/create/{id}','DiscountController@create')->name('discount.create');
	Route::post('/discount/create','DiscountController@store')->name('discount.store');
	Route::get('/discount/edit/{id}', function($id){
		return view('discount.edit')->with('discount', App\Discount::findOrFail($id));
	});
	Route::post('/discount/edit', 'DiscountController@update')->name('discount.update');
	Route::get('/discount/delete/{id}', 'DiscountController@deleteDiscount')->name('discount.deleteDiscount');
		// Fournisseurs
	Route::get('/compta/fournisseur/{id}', 'ComptaController@modifyFournisseur')->name('modifyFournisseur');
	Route::get('/compta/listFournisseur', 'ComptaController@manageFournisseur')->name('manageFournisseur');
	Route::get('/compta/listFournisseur/delete/{id}', 'ComptaController@deleteFournisseur')->name('deleteFournisseur');
		// Invoices (factures)
	Route::resource('invoices', 'InvoiceController');
		// Dons
	Route::get('/compta/listDon', 'ComptaController@manageDons')->name('manageDons');
	// Error
	Route::get('/403', 'ErrorController@error403')->name('403');
});
