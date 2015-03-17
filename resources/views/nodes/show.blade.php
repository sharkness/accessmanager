@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Viewing Switch {{ $node->name }}</div>
            
                                <div class="panel-header">
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <a href="/dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes">
                                                <i class="fa fa-cloud"></i> Access Switches
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-tasks"></i> {{ $node->name }}
                                        </li>
                                    </ol>
                                </div>
            

			<div class="panel-body">
			    <h4><i class="fa fa-tasks"></i> {{ $node->name }} [{!! link_to_route('nodes.edit', 'Edit Switch Details', $node->id) !!}]</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        Name: {{ $node->name }}<br>
                                        Model: {{ $node->model_number }}<br>
                                        Location: {{ $node->location }}<br>
                                        Management IP: {{ $node->mgmt_ip }}<br>
                                        Notes: {{ $node->notes }}<br>
                                    </div>
                                    <div class="col-md-6">
                                        @if ( ! isset($nagiosHostStatus))
                                            Monitoring is not set up for this host.
                                        @elseif ( isset($nagiosHostStatus))
                                            @if ( $nagiosHostStatus->current_state == 0)
                                                Status: This host is up!
                                            @elseif ( $nagiosHostStatus->current_state == 1)
                                                Status: This host is down!
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <!-- <h4>Cards in {{ $node->name }}</h4>
                                @if (count($modules))
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Slot Number</th>
                                        <th>Port Count</th>
                                        <th>Notes</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td nowrap>{!! link_to_route('nodes.modules.show', $module->name, [$node->id, $module->id]) !!}</td>
                                            <td>{{ $module->slot_number }}</td>
                                            <td>{{ $module->port_count }}</td>
                                            <td>{{ $module->notes }}</td>
                                            <td>
                                                {!! Form::model($module, ['route' => ['nodes.modules.destroy', $node->id, $module->id], 'method' => 'delete' ]) !!}
                                                {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs'] ) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @elseif ( ! count($modules))
                                    <h5>There are no modules associated with {{ $node->name }}.</h5>
                                    {!! link_to_route('nodes.modules.create', 'Add a Module', $node->id, ['class' => 'btn btn-primary']) !!}
                                @endif -->

<!-- ========== Start of Collapsible Area========== -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    
                                    @foreach ($modules as $module)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading{{ $module->id}}">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $module->id }}" aria-expanded="false" aria-controls="collapse{{ $module->id }}">
                                                    Slot {{ $module->slot_number }} /  {{ $module->name }}
                                                </a>
                                                
                                            </div>
                                            <div id="collapse{{ $module->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $module->id }}">
                                              <div class="panel-body">
                                                    <h5><i class="fa fa-sitemap"></i> Card Details [{!! link_to_route('nodes.modules.edit', 'Edit', [$node->id, $module->id]) !!}]</h5>
                                                                                    Card Name: {{ $module->name }}<br>
                                                                                    Port count: {{ $module->port_count }}<br>
                                                                                    Slot number: {{ $module->slot_number }}<br>
                                                                                    Notes: {{ $module->notes }}<br>
                                                                                    <br>
<!-- =================== Start of Ports table in Collapsible Area =============================================== -->                                                    
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Port Name</th>
                                                        <th>Active</th>
                                                        <th>Port Number</th>
                                                        <th>Management IP</th>
                                                        <th>Monitored</th>
                                                        <th>Notes</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    @foreach ($module->ports as $port)
                                                        <tr>
                                                            <td>{!! link_to_route('nodes.modules.ports.show', $port->name, [$node->id, $module->id, $port->id]) !!}</td>
                                            
                <!-- ========== START PORT ACTIVATION ========== -->                                            
                                                            @if ($port->is_active == 0)
                                                                <td>
                                                                   <i class="fa fa-times-circle goatCloseX" data-toggle="modal" data-target="#portIsNotActive{{ $port->id }}"></i>                                                   
                                                                    <!-- ACTIVATE Port -->
                                                                    <div class="modal fade" id="portIsNotActive{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="activatePort{{ $port->id }}" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="activatePort{{ $port->id }}">Port is Not Active</h4>
                                                                          </div>
                                                                          
                                                                          @if ($port->mgmt_ip == '127.0.0.1')
                                                                              <div class="modal-body">
                                                                              <h5>Before a port can be activated, you must configure the management IP address for the ONT.  127.0.0.1 is a generic placeholder.  Please set the management IP.</h5>
                                                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.activatePort', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                               <div class="form-group">
                                                                                  {!! Form::label('mgmt_ip', 'Management IP: ') !!}
                                                                                  {!! Form::text('mgmt_ip', null, ['class' => 'form-control']) !!}
                                                                               </div>
                                                                                {!! Form::button('Activate ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                                                {!! Form::close() !!}    
                                                                              </div>
                                                                          @else
                                                                              <div class="modal-body">
                                                                              <h5>Please verify the management IP.</h5>
                                                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.activatePort', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                               <div class="form-group">
                                                                                  {!! Form::label('mgmt_ip', 'Management IP: ') !!}
                                                                                  {!! Form::text('mgmt_ip', null, ['class' => 'form-control']) !!}
                                                                               </div>
                                                                                {!! Form::button('Activate ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                                                {!! Form::close() !!}    
                                                                              </div>
                                                                          @endif
                                                                          
                                                                          <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>                                                                                
                                                                </td>
                                                            @elseif ($port->is_active == 1)
                                                                <td>
                                                                   <i class="fa fa-check-circle goatCheckmark" data-toggle="modal" data-target="#portIsActive{{ $port->id }}"></i>
                                                                    <!-- DEACTIVATE Port -->
                                                                    <div class="modal fade" id="portIsActive{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="deactivatePort{{ $port->id }}" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="deactivatePort{{ $port->id }}">Port Is Active</h4>
                                                                          </div>
                                                                          
                                                                          <div class="modal-body">
                                                                            {!! Form::model($node, ['route' => ['nodes.modules.ports.deactivatePort', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                            {!! Form::hidden('mgmt_ip', $port->mgmt_ip) !!}
                                                                            {!! Form::button('Deactivate ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-danger goatModalButton'] ) !!}
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
                <!-- ========== END PORT ACTIVATION ========== -->                                            
                                                                                                                                
                                                            <td>{{ $port->port_number }}</td>
                                                            <td>{{ $port->mgmt_ip }}</td>
                                                                                        
                <!-- ========== START MONITORING ON/OFF ========== -->                                                                                        
                                                            @if ($port->is_monitored == 0)
                                                                <td>
                                                                   <i class="fa fa-times-circle goatCloseX" data-toggle="modal" data-target="#monitorIsOff{{ $port->id }}"></i>                                                   
                                                                    <!-- Modal to Turn Monitoring ON -->
                                                                    <div class="modal fade" id="monitorIsOff{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="turnMonitoringOn{{ $port->id }}" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="turnMonitoringOf{{ $port->id }}">Monitoring is currently OFF</h4>
                                                                          </div>
                                                                          
                                                                          @if ($port->mgmt_ip == '127.0.0.1')
                                                                              <div class="modal-body">
                                                                                  <h5>Before a host can be monitored, you must configure the management IP address for the ONT.  127.0.0.1 is a generic placeholder.  Please set the management IP.</h5>
                                                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.turnMonitoringOn', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                               <div class="form-group">
                                                                                  {!! Form::label('mgmt_ip', 'Management IP: ') !!}
                                                                                  {!! Form::text('mgmt_ip', null, ['class' => 'form-control']) !!}
                                                                               </div>
                                                                                {!! Form::button('Turn On Monitoring for ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                                                {!! Form::close() !!}    
                                                                              </div>
                                                                          @else
                                                                              <div class="modal-body">
                                                                                  <h5>Please verify the management IP.</h5>
                                                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.turnMonitoringOn', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                               <div class="form-group">
                                                                                  {!! Form::label('mgmt_ip', 'Management IP: ') !!}
                                                                                  {!! Form::text('mgmt_ip', null, ['class' => 'form-control']) !!}
                                                                               </div>
                                                                                {!! Form::button('Turn On Monitoring for ' . $port->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                                                {!! Form::close() !!}    
                                                                              </div>
                                                                          @endif
                                                                          
                                                                          <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>                                                                                
                                                                </td>
                                                            @elseif ($port->is_monitored == 1)
                                                                <td>
                                                                   <i class="fa fa-check-circle goatCheckmark" data-toggle="modal" data-target="#monitorIsOn{{ $port->id }}"></i>
                                                                    <!-- Modal to Turn Monitoring OFF -->
                                                                    <div class="modal fade" id="monitorIsOn{{ $port->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Monitoring is currently ON</h4>
                                                                          </div>
                                                                          
                                                                          <div class="modal-body">
                                                                            {!! Form::model($node, ['route' => ['nodes.modules.ports.turnMonitoringOff', $node->id, $module->id, $port->id], 'method' => 'post']) !!}
                                                                            {!! Form::hidden('mgmt_ip', $port->mgmt_ip) !!}
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
                <!-- ========== END MONITORING ON/OFF ========== -->                                            
                                                                                        
                                                            <td>{{ $port->notes }}</td>
                                                            <td>
                                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.destroy', $node->id, $module->id, $port->id], 'method' => 'delete' ]) !!}
                                                                {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs'] ) !!}
                                                                {!! Form::close() !!}    
                                                            </td>                                            
                                                        </tr>
                                                    @endforeach
                                                </table>
<!-- =================== End of Ports table in Collapsible Area =============================================== -->                                                    
                                              </div>
                                            </div>
                                          </div>
                                      @endforeach
                                      
                                </div>
<!-- ========== End of Collapsible Area========== -->

			</div>
		</div>
	</div>
</div>
@endsection