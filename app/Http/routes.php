<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('start', 'HomeController@start');

Route::get('dashboard', 'DashboardController@index');

Route::resource('nodes', 'NodesController');
Route::resource('nodes.modules', 'ModulesController');
Route::resource('nodes.modules.ports', 'PortsController');

Route::get('monitoring', 'NagiosController@index');
Route::get('monitoring/{host_object_id}', 'NagiosController@show');

Route::get('logs', 'LogsController@index');
Route::get('dhcp', 'DhcpController@index');
Route::get('tftp', 'TftpController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
