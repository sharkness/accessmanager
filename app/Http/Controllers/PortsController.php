<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Node;
use App\Module;
use App\Port;
use App\Http\Requests\CreatePortRequest;
use App\NagiosHost;
use App\NagiosHoststatus;
use App\Events\PortWasActivated;
use App\Events\PortWasDeactivated;
use App\Events\MonitoringWasTurnedOn;
use App\Events\MonitoringWasTurnedOff;

class PortsController extends Controller {
    
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
            $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Node $node, Module $module, Port $port)
	{
            $ports = $module->ports()->get();
            return view('nodes.modules.ports.index')->with('node', $node)->with('module', $module)->with('ports', $ports);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Node $node, Module $module)
	{
            return view('nodes.modules.ports.create')->with('node', $node)->with('module', $module);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function store(CreatePortRequest $request, $node, $module)
        {
                    $port = new Port($request->all());
                    $module->ports()->save($port);
                    return redirect()->route('nodes.modules.ports.index', ['node' => $node->id, 'module' => $module->id]);
        }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Node $node, Module $module, Port $port)
	{
            $nagiosHostData = $port->nagiosHostData;
            
            if( ! is_null($nagiosHostData))
            {
                $nagiosHostStatus = NagiosHoststatus::where('host_object_id', '=', $nagiosHostData->host_object_id)->first();
                return view('nodes.modules.ports.show')->with('node', $node)->with('module', $module)->with('port', $port)->with('nagiosHostData', $nagiosHostData)->with('nagiosHostStatus', $nagiosHostStatus);
            }
            elseif ( is_null($nagiosHostData))
            {
        	    return view('nodes.modules.ports.show')->with('node', $node)->with('module', $module)->with('port', $port);
            }         
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Node $node, Module $module, Port $port)
	{
            return view('nodes.modules.ports.edit')->with('node', $node)->with('module', $module)->with('port', $port);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Node $node, Module $module, Port $port, CreatePortRequest $request)
	{
            $port->update($request->all());
            return redirect()->route('nodes.modules.ports.show', ['node' => $node->id, 'module' => $module->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Node $node, Module $module, Port $port)
	{
            $port->delete();
            return redirect()->route('nodes.modules.ports.show', ['node' => $node->id, 'module' => $module->id]);
	}
    
	public function turnMonitoringOn(Node $node, Module $module, Port $port)
	{
            $port->is_monitored = 1;
            $port->save();
            \Event::fire(new MonitoringWasTurnedOn($port->name, $port->mgmt_ip));
            // return redirect()->route('nodes.modules.show', ['node' => $node->id, 'module' => $module->id]);
            return redirect()->route('nodes.show', ['node' => $node->id]);
	}

	public function turnMonitoringOff(Node $node, Module $module, Port $port)
	{
            $port->is_monitored = 0;
            $port->save();
            \Event::fire(new MonitoringWasTurnedOff($port->name, $port->mgmt_ip));
            return redirect()->route('nodes.modules.show', ['node' => $node->id, 'module' => $module->id]);
	}

	public function activatePort(Node $node, Module $module, Port $port)
	{
            $port->is_active = 1;
            $port->save();
            \Event::fire(new PortWasActivated($port->id, $port->name, $port->mgmt_ip));
            return redirect()->route('nodes.modules.show', ['node' => $node->id, 'module' => $module->id]);
	}

	public function deactivatePort(Node $node, Module $module, Port $port)
	{
            $port->is_active = 0;
            $port->save();
            \Event::fire(new PortWasDeactivated($port->id, $port->name, $port->mgmt_ip));
            return redirect()->route('nodes.modules.show', ['node' => $node->id, 'module' => $module->id]);
	}
    

}
