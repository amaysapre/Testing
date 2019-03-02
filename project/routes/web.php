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
    return view('login.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {

Route::get('admin','AdminController@index');
Route::get('admin/task','AdminController@taskall');
Route::get('admin/managerlist','AdminController@managerlist');
Route::get('admin/managerlist/edit/{id}','AdminController@edit');
Route::post('admin/managerlist/update/{id}','AdminController@update');
Route::get('admin/addmanager','AdminController@addmanager');
Route::post('admin/addmanager','AdminController@create_manager');
Route::get('admin/devloperlist','AdminController@devloperlist');
Route::get('admin/devloperlist/devedit/{id}','AdminController@devedit');
Route::post('admin/devloperlist/devupdate/{id}','AdminController@devupdate');
Route::post('admin/adddevloper','AdminController@create_devloper');
Route::get('admin/adddevloper','AdminController@adddevloper');
Route::get('admin/task/edittask/{id}','AdminController@edittask');
Route::post('admin/task/edittask/{id}','AdminController@updatetask');
Route::post('get_dev','AdminController@get_dev');
});

Route::middleware(['manager'])->group(function () {

Route::get('manager','ManagerController@index');
Route::get('manager/addtask','ManagerController@add');
Route::Post('manager/addtask','ManagerController@create_task');
Route::get('manager/task','ManagerController@task');
Route::get('manager/devloper/edit/{id}','ManagerController@edit');
Route::Post('manager/devloper/update/{id}','ManagerController@update');
Route::get('manager/devloper','ManagerController@devloperlist');
Route::get('manager/add','ManagerController@add_devloper');
Route::post('manager/add','ManagerController@create_devloper');
Route::get('manager/editstatus/{id}','ManagerController@editstatus');
Route::post('manager/editstatus/{id}','ManagerController@updatebymgr');
Route::get('manager/destroy/{id}','ManagerController@destroy');
Route::get('manager/devloper/del/{id}','ManagerController@del');
});

Route::middleware(['devloper'])->group(function () {
Route::get('devloper','DevloperController@index');
Route::get('devloper/task','DevloperController@task');
Route::post('devloper/update/{id}','DevloperController@update');
Route::get('devloper/edit/{id}','DevloperController@edit');

});