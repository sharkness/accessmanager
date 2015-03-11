@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
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
                                                <i class="fa fa-cloud"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}/modules/{{ $module->id }}">
                                                <i class="fa fa-cloud"></i> {{ $module->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-cloud"></i> {{ $port->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                {!! link_to_route('nodes.modules.ports.index', 'Back', [$node->id, $module->id], ['class' => 'btn btn-primary']) !!}
                                
                                <h4>You are viewing port {{ $port->name }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Properties</th>
                                        <th>Values</th>
                                    </tr>
                                    <tr>
                                        <td>Port Name</td><td>{{ $port->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Port Number</td><td>{{ $port->number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Port Notes</td><td>{{ $port->notes}}</td>
                                    </tr>
                                </table>
			</div>
		</div>
	</div>
</div>
@endsection