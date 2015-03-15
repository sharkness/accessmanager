@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
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
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-sitemap"></i> {{ $module->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <h4><i class="fa fa-sitemap"></i> Module Details [{!! link_to_route('nodes.modules.edit', 'Edit', [$node->id, $module->id]) !!}]</h4>
                                Name: {{ $module->name }}<br>
                                Port count: {{ $module->port_count }}<br>
                                Slot number: {{ $module->slot_number }}<br>
                                Notes: {{ $module->notes }}<br>
                                <hr>
                                
                                <h4>Ports in {{ $module->name }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Port Name</th>
                                        <th>Port Number</th>
                                        <th>Management IP</th>
                                        <th>Monitored</th>
                                        <th>Notes</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($ports as $port)
                                        <tr>
                                            <td>{!! link_to_route('nodes.modules.ports.show', $port->name, [$node->id, $module->id, $port->id]) !!}</td>
                                            <td>{{ $port->port_number }}</td>
                                            <td>{{ $port->mgmt_ip }}</td>
                                            
                                            @if ($port->is_monitored == 0)
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#monitorIsOff">
                                                      Monitoring is Off
                                                    </button> -->
                                                   <i class="fa fa-times-circle goatCloseX" data-toggle="modal" data-target="#monitorIsOff{{ $port->id }}"></i>
                                                   
                                                    <!-- Modal to Turn Monitoring ON -->
                                                    <div class="modal fade" id="monitorIsOff{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="turnMonitoringOn{{ $port->id }}" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="turnMonitoringOn{{ $port->id }}">Monitoring is currently OFF</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            {!! Form::model($port, ['route' => ['nodes.modules.ports.turnMonitoringOn', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                            {!! Form::button('Turn On Monitoring for ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                            {!! Form::close() !!}    
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>                            
                                                    
                                                </td>
                                            @elseif ($port->is_monitored == 1)
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#monitorIsOn">
                                                      Monitoring is On
                                                    </button> -->
                                                   <i class="fa fa-check-circle goatCheckmark" data-toggle="modal" data-target="#monitorIsOn{{ $port->id }}"></i>
                                                    <!-- Modal to Turn Monitoring OFF -->
                                                    <div class="modal fade" id="monitorIsOn{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="turnMonitoringOff{{ $port->id }}" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="turnMonitoringOff{{ $port->id }}">Monitoring is currently ON</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            {!! Form::model($node, ['route' => ['nodes.modules.ports.turnMonitoringOff', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                            {!! Form::button('Turn Off Monitoring for ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-danger goatModalButton'] ) !!}
                                                            {!! Form::close() !!} 
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    
                                                </td>
                                            @endif
                                            
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