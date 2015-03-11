@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Port Show Page</div>

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