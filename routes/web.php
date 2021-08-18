<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             'Auth\LoginController@index')->name('login');

Route::post('/auth',        'Auth\LoginController@auth')->name('auth');
Route::post('/logout',      'Auth\LoginController@logout')->name('logout');

Route::get('/home',         'Page\HomeController@index')->name('home');
Route::get('/user',         'Page\UserController@index')->name('user');
Route::get('/company',      'Page\CompanyController@index')->name('company');
Route::get('/partner',      'Page\PartnerController@index')->name('partner');
Route::get('/request',      'Page\RequestController@index')->name('request');
Route::get('/manage',       'Page\ManageController@index')->name('manage');
Route::get('/profile',      'Page\ProfileController@index')->name('profile');
Route::get('/permission',   'Page\PermissionController@index')->name('permission');