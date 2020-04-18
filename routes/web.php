<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('bedstatus', 'HomeController@bedstatus')->name('bedstatus');

Route::get('get_ipd', 'HomeController@get_ipd')->name('ipd_get');
Route::post('set_ipd', 'HomeController@set_ipd')->name('set_ipd');


Route::get('get_opd', 'HomeController@get_opd')->name('opd_get');
Route::post('set_opd', 'HomeController@set_opd')->name('set_opd');
Route::get('patients', 'HomeController@patients')->name('patients');

Route::post('patient/create', 'HomeController@patient_create')->name('patient.create');

Route::get('test', 'HomeController@test')->name('test');


Route::get('staff','Backend\Admin\StaffController@index')->name('staff');
Route::get('staff/create','Backend\Admin\StaffController@create')->name('staff.create');
Route::post('staff/create','Backend\Admin\StaffController@store')->name('staff.create');
Route::get('staff/{staff}','Backend\Admin\StaffController@show')->name('staff.show');
Route::get('staff/{staff}/edit','Backend\Admin\StaffController@edit')->name('staff.edit');
