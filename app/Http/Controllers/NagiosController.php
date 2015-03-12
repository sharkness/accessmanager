<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\NagiosHost;
use App\NagiosHoststatus;

class NagiosController extends Controller {
    
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
        $nagios_hosts = NagiosHost::get();
        return view('monitoring.index')->with('nagios_hosts', $nagios_hosts);
    }
    
    public function show(NagiosHost $nagiosHost)
    {
        $nagiosHoststatus = $nagiosHost->hoststatus;
        return view('monitoring.show')->with('nagiosHost', $nagiosHost)->with('nagiosHoststatus', $nagiosHoststatus);
    }

}
