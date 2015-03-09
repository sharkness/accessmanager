@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Viewing node {{ $node->name }}</div>

			<div class="panel-body">
                                {!! link_to_route('nodes.index', 'Back', null, ['class' => 'btn btn-primary']) !!}
			    <h4>Node Details</h4>
                                <table class="table table-hover">
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
                                </table>
			</div>
		</div>
	</div>
</div>
@endsection