<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'company.'], function() {
    
    // companies
    Route::get('/', 'CompanyController@index')->name('list');
	Route::get('/company/add', 'CompanyController@create')->name('add');
    Route::post('/company/store', 'CompanyController@store')->name('store');
    Route::get('/company/{id}', 'CompanyController@show')->name('employees');
    Route::get('/company/{id}/edit', 'CompanyController@edit')->name('edit');
    Route::put('/company/{id}/update', 'CompanyController@update')->name('update');
	Route::get('/company/{id}/delete', 'CompanyController@destroy')->name('delete');
    
    // companies' employees
    Route::group(['as' => 'employee.'], function() {
        Route::get('/company/{id}/employee/{id_employee}/edit', 'EmployeeController@edit')->name('edit');
        Route::get('/company/{id}/employee/add', 'EmployeeController@create')->name('add');
        Route::post('/company/{id}/employee/store', 'EmployeeController@store')->name('store');
        Route::put('/company/{id}/employee/{id_employee}/update', 'EmployeeController@update')->name('update');
        Route::get('/company/{id}/employee/{id_employee}/delete', 'EmployeeController@destroy')->name('delete');
    });
});

// full list of employees
Route::get('/employees', 'EmployeeController@index')->name('employee.list');
Route::get('/404-not-found', 'NotFoundController@view')->name('404.not.found');

Route::fallback(function() {
    return redirect()->route('404.not.found');
});

