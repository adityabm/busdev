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



Route::get('/', 'HomeController@index')->name('landing');

Auth::routes();

Route::get('project/{slug}', 'HomeController@detailProject')->name('project_detail');
Route::get('project/order/{slug}/{pay}', 'OrderController@index')->name('project_order');
Route::post('project/order/proses', 'OrderController@proses')->name('project_order_proses');

Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

	Route::group(['prefix' => 'project'], function () {
		Route::get('/', 'Admin\ProjectController@index')->name('project');
		Route::get('get-data', 'Admin\ProjectController@getData')->name('project_data');
		Route::post('upload-image', 'Admin\ProjectController@uploadImage')->name('project_upload_image');
		Route::post('upload-file', 'Admin\ProjectController@uploadFile')->name('project_upload_file');
		Route::post('proses', 'Admin\ProjectController@proses')->name('project_proses');
		Route::post('approve', 'Admin\ProjectController@approve')->name('project_approve');
		Route::post('reject', 'Admin\ProjectController@reject')->name('project_reject');
	});
});