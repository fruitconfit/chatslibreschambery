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
	
	//Authentification
	Route::group(array('group_name' => 'Authentification'), function()
	{
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/account', 'AccountController@index')->name('account');
		Route::get('/account', 'AccountController@modify')->name('accountModify');
		Route::get('/logout', 'AccountController@logout')->name('logout');
		Route::get('/send', 'AccountController@newPassword')->name('newPassword');
		Route::get('/reset', 'AccountController@newPasswordPage')->name('newPasswordPage');
		Route::get('/renameUser/{id}', 'AccountController@renameUser')->name('renameUser');
	});

	// Erreur
	Route::group(array('group_name' => 'Erreur'), function()
	{
		Route::get('/403', 'ErrorController@error403')->name('403');
	});

	// Administration des utilisateurs
	Route::group(array('group_name' => 'Administration des utilisateurs'), function()
	{
		Route::get('/admin/groups', 'AdminController@groups')->name('groups');
		Route::get('/admin/users', 'AdminController@manageUsers')->name('users');
		Route::get('/admin/users/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
	});

	// Administation des roles
	Route::group(array('group_name' => 'Administration des roles'), function()
	{
		Route::get('/admin/groups/delete/{id}', 'AdminController@deleteRole')->name('deleteRole');
		Route::get('/admin/groups/manage/{id}', 'AdminController@manageRole')->name('manageRole');
		Route::get('/admin/role/add', 'AdminController@addRole')->name('addRole');
		Route::get('/admin/role/view', 'AdminController@viewRole')->name('viewRole');
		Route::get('/admin/users/add/role/{id}', 'AdminController@addRoleToUser')->name('addRoleToUser');
		Route::get('/admin/users/delete/role/{id}', 'AdminController@deleteRoleToUser')->name('deleteRoleToUser');
	});

	// Types de fournisseurs
	Route::group(array('group_name' => 'Gestion des types de fournisseurs'), function()
	{
		Route::get('/typefournisseur', 'ComptaController@manageTypeFournisseur')->name('manageTypeFournisseur');
		Route::get('/typefournisseur/delete/{id}', 'ComptaController@deleteTypeFournisseur')->name('deleteTypeFournisseur');
		Route::get('/typefournisseur/create', function(){
			return view('compta.typefournisseur');
		});
		Route::post('/typefournisseur/store', 'ComptaController@storeTypeFournisseur')->name('storeTypeFournisseur');
	});
	
	// Liasses
	Route::group(array('group_name' => 'Gestion des liasses'), function()
	{
		Route::get('/compta/listLiasse', 'ComptaController@manageLiasse')->name('manageLiasse');
		Route::get('/compta/liasse/{id}', 'ComptaController@modifyLiasse')->name('modifyLiasse');
		Route::get('/compta/listLiasse/delete/{id}', 'ComptaController@deleteLiasse')->name('deleteLiasse');
	});

	// Discounts (remises)
	Route::group(array('group_name' => 'Gestion des remises'), function()
	{
		Route::get('/discount/create/{id}','DiscountController@create')->name('discount.create');
		Route::post('/discount/create','DiscountController@store')->name('discount.store');
		Route::get('/discount/edit/{id}', function($id){
			return view('discount.edit')->with('discount', App\Discount::findOrFail($id));
		});
		Route::post('/discount/edit', 'DiscountController@update')->name('discount.update');
		Route::get('/discount/delete/{id}', 'DiscountController@deleteDiscount')->name('discount.deleteDiscount');
	});

	// Fournisseurs
	Route::group(array('group_name' => 'Gestion des fournisseurs'), function()
	{
		Route::get('/compta/fournisseur/{id}', 'ComptaController@modifyFournisseur')->name('modifyFournisseur');
		Route::get('/compta/listFournisseur', 'ComptaController@manageFournisseur')->name('manageFournisseur');
		Route::get('/compta/listFournisseur/delete/{id}', 'ComptaController@deleteFournisseur')->name('deleteFournisseur');
	});

	// Coupons
	Route::group(array('group_name' => 'Gestion des coupons'), function()
	{
		Route::get('/compta/coupon/{id}', 'CouponController@modifyCoupon')->name('modifyCoupon');
		Route::get('/compta/listCoupon', 'CouponController@manageCoupon')->name('manageCoupon');
		Route::get('/compta/listCoupon/delete/{id}', 'CouponController@deleteCoupon')->name('deleteCoupon');
	});

	// Invoices (factures)
	Route::group(array('group_name' => 'Gestion des factures'), function()
	{
		Route::resource('invoices', 'InvoiceController');
	});

	// Dons
	Route::group(array('group_name' => 'Gestion des dons'), function()
	{
		Route::get('/compta/listDon', 'ComptaController@manageDons')->name('manageDons');
		Route::get('/recu/{id}/print', function($id){
			$don = App\Discount::findOrFail($id);
			$numberToWords = new NumberToWords\NumberToWords();
			$currencyTransformer = $numberToWords->getCurrencyTransformer('fr');
			$somme_lettres = $currencyTransformer->toWords(str_replace(".", "",number_format($don->priceDiscount,2)), 'EUR');
			return view('recu.print', ['don' => $don, 'somme_lettres' => $somme_lettres]);
		});
	});
});
