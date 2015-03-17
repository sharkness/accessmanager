@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

                                <div class="panel-header">
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <a href="/dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-cloud"></i> Access Switches
                                        </li>
                                    </ol>
                                </div>

				<div class="panel-body">
                    
                    
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Network Events</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1 minute ago</span>
                                        <i class="fa fa-fw fa-arrow-circle-o-down"></i> ONT2 offline
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">4 minutes ago</span>
                                        <i class="fa fa-fw fa-arrow-circle-o-up"></i> ONT1 online
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">23 minutes ago</span>
                                        <i class="fa fa-fw fa-warning"></i> Latency warning on switch1
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">46 minutes ago</span>
                                        <i class="fa fa-fw fa-user"></i> User admin logged in
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1 hour ago</span>
                                        <i class="fa fa-fw fa-arrow-circle-o-down"></i> ONT1 offline
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2 hours ago</span>
                                        <i class="fa fa-fw fa-gears"></i> Admin initiate reload on switch2
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">yesterday</span>
                                        <i class="fa fa-fw fa-arrow-circle-o-up"></i> ONT2 online
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">two days ago</span>
                                        <i class="fa fa-fw fa-arrow-circle-o-down"></i> ONT2 offline
                                    </a>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                                        @if( ! count($nodes))
                                        There are no Access Nodes in the database.
                                        @else
                                                @foreach ($nodes as $node)
                                                
                                                <div class="col-lg-3 col-md-6">

                                                    <div class="panel panel-green">

                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <i class="fa fa-th-list fa-5x"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-right">
                                                                    <div class="huge"></div>
                                                                    <div>{{ $node->name }}</div>
                                                                    <div>{{ count($node->modules) }} cards</div>
                                                                    <div>{{ count($node->ports) }} ports</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="/nodes/{{ $node->id }}">
                                                            <div class="panel-footer">
                                                                <span class="pull-left">{{ $node->model_number }} | 
                                                                    @if (isset($node->mgmt_ip))
                                                                        {{ $node->mgmt_ip }}
                                                                    @else
                                                                        No IP Assigned
                                                                    @endif
                                                                </span>
                                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                                
				</div>
			</div>
		</div>
	</div>
    @endsection
