<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Node;

class DashboardController extends Controller {

    public function index()
    {
        $nodes = Node::all();
        return view('dashboard.index')->with('nodes', $nodes);
    }

}
