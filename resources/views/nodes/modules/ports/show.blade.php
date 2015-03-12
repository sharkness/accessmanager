@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Port Show Page</div>

                                <div class="panel-header">
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <a href="/dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes">
                                                <i class="fa fa-cloud"></i> AccessNodes
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}">
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}/modules/{{ $module->id }}">
                                                <i class="fa fa-sitemap"></i> {{ $module->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-square"></i> {{ $port->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <h4><i class="fa fa-square"></i> Port Details [{!! link_to_route('nodes.modules.ports.edit', 'Edit', [$node->id, $module->id, $port->id]) !!}]</h4>
                                Name:  {{ $port->name }}<br>
                                Port Number: {{ $port->port_number }}<br>
                                Notes: {{ $port->notes }}<br>
                                <hr>
                                
			</div>
		</div>
	</div>
</div>
@endsection