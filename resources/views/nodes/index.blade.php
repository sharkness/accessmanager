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
                                    <i class="fa fa-cloud"></i> AccessNodes
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">
                            @if ( ! count($nodes))
                                <h4>There are no access switches here.</h4>
                                    You should {!! link_to_route('nodes.create', 'add an access switch') !!}.
                            @elseif ( count($nodes))
                                <table class="table table-hover">
                                    <tr>
                                        <th>Node Name</th>
                                        <th>Location</th>
                                        <th>Model</th>
                                        <th nowrap>Management IP</th>
                                        <th>Monitored</th>
                                        <th>Notes</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($nodes as $node)
                                        <tr>
                                            <td>{!! link_to_route('nodes.show', $node->name, $node->id ) !!}</td>
                                            <td nowrap>{{ $node->location }}</td>
                                            <td>{{ $node->model_number }}</td>
                                            <td>{{ $node->mgmt_ip }}</td>
                                            
                                            @if ($node->is_monitored == 0)
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#monitorIsOff">
                                                      Monitoring is Off
                                                    </button> -->
                                                   <i class="fa fa-times-circle goatCloseX" data-toggle="modal" data-target="#monitorIsOff{{ $node->id }}"></i>
                                                   
                                                    <!-- Modal to Turn Monitoring ON -->
                                                    <div class="modal fade" id="monitorIsOff{{ $node->id }}" tabindex="-1" role="dialog" aria-labelledby="turnMonitoringOn{{ $node->id }}" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="turnMonitoringOn{{ $node->id }}">Monitoring is currently OFF</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            {!! Form::model($node, ['route' => ['nodes.turnMonitoringOn', $node->id], 'method' => 'post']) !!}
                                                            {!! Form::button('Turn On Monitoring for ' . $node->name, ['type' => 'submit', 'class' => 'btn btn-success goatModalButton'] ) !!}
                                                            {!! Form::close() !!}    
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>                            
                                                    
                                                </td>
                                            @elseif ($node->is_monitored == 1)
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#monitorIsOn">
                                                      Monitoring is On
                                                    </button> -->
                                                   <i class="fa fa-check-circle goatCheckmark" data-toggle="modal" data-target="#monitorIsOn{{ $node->id }}"></i>
                                                    <!-- Modal to Turn Monitoring OFF -->
                                                    <div class="modal fade" id="monitorIsOn{{ $node->id }}" tabindex="-1" role="dialog" aria-labelledby="turnMonitoringOff{{ $node->id }}" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="turnMonitoringOff{{ $node->id }}">Monitoring is currently ON</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            {!! Form::model($node, ['route' => ['nodes.turnMonitoringOff', $node->id], 'method' => 'post']) !!}
                                                            {!! Form::button('Turn Off Monitoring for ' . $node->name, ['type' => 'submit', 'class' => 'btn btn-danger goatModalButton'] ) !!}
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
                                            
                                            <td>{{ $node->notes }}</td>
                                            <td>
                                                {!! Form::model($node, ['route' => ['nodes.destroy', $node->id], 'method' => 'delete', 'onsubmit' => 'ConfirmDelete()']) !!}
                                                {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs'] ) !!}
                                                {!! Form::close() !!}    
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                            

                                                            
			</div>
		</div>
	</div>
</div>
@endsection