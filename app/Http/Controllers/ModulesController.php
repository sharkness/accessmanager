<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Node;
use App\Module;
use App\Http\Requests\CreateModuleRequest;
use App\Events\CardWasAddedToSwitch;

class ModulesController extends Controller {
    
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
	public function index(Node $node)
	{
            $modules = $node->modules()->get();
            return view('nodes.modules.index')->with('node', $node)->with('modules', $modules);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Node $node)
	{
            return view('nodes.modules.create')->with('node', $node);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateModuleRequest $request, $node)
	{
            $module = new Module($request->all());
            Node::find($node->id)->modules()->save($module);
            $module->save();
            \Event::fire(new CardWasAddedToSwitch($module->id, $module->name, $module->slot_number, $module->port_count));
            return redirect()->route('nodes.modules.index', ['node' => $node->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Node $node, Module $module)
	{
            $ports = $module->ports()->get();
            return view('nodes.modules.show')->with('node', $node)->with('module', $module)->with('ports', $ports);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Node $node, Module $module)
	{
            return view('nodes.modules.edit')->with('node', $node)->with('module', $module);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Node $node, Module $module, CreateModuleRequest $request)
	{
            $module->update($request->all());
            return redirect()->route('nodes.modules.show', ['node' => $node->id]);
        }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Node $node, Module $module)
	{
            $module->delete();
            return redirect()->route('nodes.modules.show', ['node' => $node->id]);
	}

}
