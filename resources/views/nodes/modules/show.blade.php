@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Show Page</div>

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
                                                <i class="fa fa-cloud"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-cloud"></i> {{ $module->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <!-- {!! link_to_route('nodes.modules.index', 'Back', $node->id, ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('nodes.modules.ports.index', 'View Ports for this module', [$node->id, $module->id], ['class' => 'btn btn-primary']) !!} -->
                                <h4>Module Details [{!! link_to_route('nodes.modules.edit', 'Edit', [$node->id, $module->id]) !!}]</h4>
                                Name: {{ $module->name }}<br>
                                Port count: {{ $module->port_count }}<br>
                                Slot number: {{ $module->slot_number }}<br>
                                Notes: {{ $module->notes }}<br>
                                <hr>
                                
                                <!-- <table class="table table-hover">
                                    <tr>
                                        <th>Properties</th>
                                        <th>Values</th>
                                    </tr>
                                    <tr>
                                        <td>Name</td><td>{{ $module->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Slot Number</td><td>{{ $module->slot_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Port Count</td><td>{{ $module->port_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Notes</td><td>{{ $module->notes }}</td>
                                    </tr>
                                </table> -->
                                
                                <h4>Ports in {{ $module->name }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Port Name</th>
                                        <th>Port Number</th>
                                        <th>Notes</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($ports as $port)
                                        <tr>
                                            <td>{!! link_to_route('nodes.modules.ports.show', $port->name, [$node->id, $module->id, $port->id]) !!}</td>
                                            <td>{{ $port->port_number }}</td>
                                            <td>{{ $port->notes }}</td>
                                            <td>
                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.destroy', $node->id, $module->id, $port->id], 'method' => 'delete' ]) !!}
                                                {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs'] ) !!}
                                                {!! Form::close() !!}    
                                            </td>                                            
                                        </tr>
                                    @endforeach
                                </table>
                                
			</div>
		</div>
	</div>
</div>
@endsection