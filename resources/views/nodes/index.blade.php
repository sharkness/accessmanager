@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Nodes Index Page</div>

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
<!--Good looking panels from Dashboard page -->
						<div class="panel-body">
                                        @if( ! count($nodes))
                                        There are no Access Nodes in the database.
                                        @else
                                                @foreach ($nodes as $node)
                                                
                                                <div class="col-md-4 col-sm-12">

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
						</div><!--end panel body line 22-->


		</div><!--end line 6 panel-default-->
	</div><!--end line 5 col-md-12-->
</div>
@endsection