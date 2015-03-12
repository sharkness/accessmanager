<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Node;
use App\Http\Requests\CreateNodeRequest;
use App\NagiosHost;

class NodesController extends Controller {
    
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
	public function index()
	{
            $nodes = Node::all();
            return view('nodes.index')->with('nodes', $nodes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('nodes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateNodeRequest $request)
	{
            $node = new Node($request->all());
            $node->save();
            return redirect('nodes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Node $node
	 * @return Response
	 */
	public function show(Node $node)
	{
            $modules = $node->modules()->get();
            // This might be a bit non-standard, but let's check whether or not there is a "host_object_id" in the database
            // for this node.  If not, let's just move on to the view which will check and tell us that this host is not monitored.
            // Otherwise, go get the hoststatus from the NagiosHost model's relationship with NagiosHoststatus.
            if ($node->host_object_id == 0) {
                return view('nodes.show')->with('node', $node)->with('modules', $modules);
            } else {
                $nagiosHoststatus = NagiosHost::findOrFail($node->host_object_id)->hoststatus;
                return view('nodes.show')->with('node', $node)->with('modules', $modules)->with('nagiosHoststatus', $nagiosHoststatus);
            }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Node $node
	 * @return Response
	 */
	public function edit(Node $node)
	{
		return view('nodes.edit')->with('node', $node);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Node $node, CreateNodeRequest $request)
	{
            $node->update($request->all());
            return redirect('nodes');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Node $node)
	{
            $node->delete();
            return redirect('nodes');
	}

}
