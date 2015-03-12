@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Network Monitoring</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Monitoring
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">
                                <h4>All monitored hosts</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Display Name</th>
                                        <th>Alias</th>
                                        <th>Address</th>
                                    </tr>
                                    @foreach ($nagios_hosts as $host)
                                        <tr>
                                            <td>{{ $host->display_name }}</td>
                                            <td>{{ $host->alias }}</td>
                                            <td>{{ $host->address }}</td>
                                        </tr>
                                    @endforeach
                                </table>

			</div>
		</div>
	</div>
</div>
@endsection