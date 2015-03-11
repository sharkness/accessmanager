@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Viewing node {{ $node->name }}</div>
            
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
                                            <i class="fa fa-cloud"></i> {{ $node->name }}
                                        </li>
                                    </ol>
                                </div>
            

			<div class="panel-body">
                                <!-- {!! link_to_route('nodes.index', 'Back', null, ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('nodes.modules.index', 'View Modules', $node->id, ['class' => 'btn btn-primary']) !!} -->
			    <h4>Node Details [{!! link_to_route('nodes.edit', 'Edit', $node->id) !!}]</h4>
                                Name: {{ $node->name }}<br>
                                Model: {{ $node->model_number }}<br>
                                Location: {{ $node->location }}<br>
                                Management IP: {{ $node->mgmt_ip }}<br>
                                Notes: {{ $node->notes }}<br>
                                <hr>
                                
                                <!-- <table class="table table-hover">
                                    <tr>
                                        <th>Property</th>
                                        <th>Value</th>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $node->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td>{{ $node->location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Management IP</td>
                                        <td>{{ $node->mgmt_ip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td>{{ $node->model_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Notes</td>
                                        <td>{{ $node->notes }}</td>
                                    </tr>
                                </table> -->
                                
                                <h4>Modules in {{ $node->name }}</h4>
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