<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('bedstatus', 'HomeController@bedstatus')->name('bedstatus');

Route::get('get_ipd', 'HomeController@get_ipd')->name('ipd_get');
Route::post('set_ipd', 'HomeController@set_ipd')->name('set_ipd');


Route::get('get_opd', 'Backend\Admin\OPDController@index')->name('opd_get');
Route::post('set_opd', 'Backend\Admin\OPDController@store')->name('set_opd');
Route::get('patients', 'HomeController@patients')->name('patients');

Route::post('patient/create', 'HomeController@patient_create')->name('patient.create');

Route::get('test', 'HomeController@test')->name('test');


Route::get('staff','Backend\Admin\StaffController@index')->name('staff');
Route::get('staff/create','Backend\Admin\StaffController@create')->name('staff.create');
Route::post('staff/create','Backend\Admin\StaffController@store')->name('staff.create');
Route::get('staff/{staff}','Backend\Admin\StaffController@show')->name('staff.show');
Route::get('staff/{staff}/edit','Backend\Admin\StaffController@edit')->name('staff.edit');




Route::group(['prefix' => 'ajax','namespace'=>'Api\Ajax','as'=>'ajax.'], function () {
    Route::get('get_opd','DatatabelController@index')->name('get_opd');
    Route::get('get_patinet','AjaxController@get_patinet')->name('get_patinet');


    Route::get('get_doctor_opd_charge','AjaxController@get_doctor_opd_charge')->name('get_doctor_opd_charge');
});
