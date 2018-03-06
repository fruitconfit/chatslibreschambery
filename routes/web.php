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
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/account', 'AccountController@modify')->name('accountModify');
Route::get('/logout', 'AccountController@logout')->name('logout');
Route::get('/send', 'AccountController@newPassword')->name('newPassword');
Route::get('/reset', 'AccountController@newPasswordPage')->name('newPasswordPage');
Route::get('/admin/groups', 'AdminController@groups')->name('groups');
Route::get('/admin/groups/delete/{id}', 'AdminController@deleteRole')->name('deleteRole');
Route::get('/admin/groups/manage', 'AdminController@manageGroups')->name('manageGroups');
Route::get('/admin/users', 'AdminController@manageUsers')->name('users');
Route::get('/admin/users/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
Route::get('/admin/role/add', 'AdminController@addRole')->name('addRole');
Route::get('/admin/users/add/role/{id}', 'AdminController@addRoleToUser')->name('addRoleToUser');
Route::get('/admin/users/delete/role/{id}', 'AdminController@deleteRoleToUser')->name('deleteRoleToUser');
Route::get('/compta/liasse/{id}', 'ComptaController@manageLiasse')->name('manageLiasse');
