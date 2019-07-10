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
Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard');


    Route::get('/department/create','DepartmentController@create')->name('departments');
    Route::post('/department/store','DepartmentController@store')->name('department.store');
    Route::get('/department/status/{id}','DepartmentController@dep_status')->name('department.status');
    Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');
    Route::get('/department/delete/{id}','DepartmentController@delete')->name('department.delete');
    
    
    Route::get('/employee/create','EmployeeController@create')->name('employees');
    Route::post('/employee/store','EmployeeController@store')->name('employee.store');
    Route::post('/employee/update/{id}','EmployeeController@update')->name('employee.update');
    Route::get('/employee/delete/{id}','EmployeeController@delete')->name('employee.delete');
});




