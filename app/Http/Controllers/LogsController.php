<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Logs;

class LogsController extends Controller {
    
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
            $this->middleware('auth');
	}
    

    public function index()
    {
        $logs = Logs::where('SysLogTag', 'like', 'dhcpd%')->get();
        return view('logs.index')->with('logs', $logs);
    }


}
