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

Route::get('/hello', function () {
    return 'ahihi';
});
Route::get('ahihi', function () {
    return 'hello ahihi';
});

/*********** Router Admin ***********/
Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
	'namespace' => 'Admin'
],
function(){
	Route::get('login','LoginController@loginView')->name('loginView');
	Route::post('handle-login','LoginController@handleLogin')->name('handleLogin');
	Route::post('logout','LoginController@logout')->name('logout');
});

Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
	'namespace' => 'Admin',
	'middleware' => ['adminLogined', 'web']
],
function() {
	Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::get('staff','StaffController@index') ->name('staff');
	Route::get('add-staff','StaffController@addStaff')->name('addStaff');
	Route::post('handle-add-staff','StaffController@handleAddStaff')->name('handleAddStaff');
	Route::post('delete-staff','StaffController@deleteStaff')->name('deleteStaff');
	Route::get('edit-staff/{id}','StaffController@editStaff')->name('editStaff')->where(['id'=>'[0-9]+']);

	Route::post('hande-edit-staff/{id}','StaffController@handleEditStaff')
			->name('handleEditStaff')
			->where(['id'=>'[0-9]+']);
});