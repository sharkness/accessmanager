<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Node;
use App\Http\Requests\CreateNodeRequest;

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
            return view('nodes.show')->with('node', $node);
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
