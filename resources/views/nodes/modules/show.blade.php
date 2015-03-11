@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Show Page</div>

			<div class="panel-body">
                                {!! link_to_route('nodes.modules.index', 'Back', $node->id, ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('nodes.modules.ports.index', 'View Ports for this module', [$node->id, $module->id], ['class' => 'btn btn-primary']) !!}
                                <h5>You are viewing module {{ $module->name }} on node {{ $node->name }}</h5>
                                <table class="table table-hover">
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
                                </table>
			</div>
		</div>
	</div>
</div>
@endsection