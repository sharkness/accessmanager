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
			    <h4><i class="fa fa-tasks"></i> Switch Details [{!! link_to_route('nodes.edit', 'Edit', $node->id) !!}]</h4>
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
                                
                                <h4>Cards in {{ $node->name }}</h4>
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
                                @endif

			</div>
		</div>
	</div>
</div>
@endsection