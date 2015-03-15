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

Route::post('nodes/{nodes}/monitorOn', ['as' => 'nodes.turnMonitoringOn', 'uses' => 'NodesController@turnMonitoringOn']);
Route::post('nodes/{nodes}/monitorOff', ['as' => 'nodes.turnMonitoringOff', 'uses' => 'NodesController@turnMonitoringOff']);

Route::post('nodes/{nodes}/modules/{modules}/ports/{ports}/monitorOn', ['as' => 'nodes.modules.ports.turnMonitoringOn', 'uses' => 'PortsController@turnMonitoringOn']);
Route::post('nodes/{nodes}/modules/{modules}/ports/{ports}/monitorOff', ['as' => 'nodes.modules.ports.turnMonitoringOff', 'uses' => 'PortsController@turnMonitoringOff']);

Route::get('monitoring', 'NagiosController@index');
Route::get('monitoring/{host_object_id}', 'NagiosController@show');

Route::get('logs', ['as' => 'logs.index', 'uses' => 'LogsController@index']);

Route::get('dhcp', 'DhcpController@index');
Route::get('tftp', 'TftpController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
