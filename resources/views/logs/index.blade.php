@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Logs Page</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <a href="/dashboard">
                                        <i class="fa fa-dashboard"></i> Dashboard
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-book"></i> DHCP Logs
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">

                            <h4><i class="fa fa-book"></i> Syslog Events</h4>
                            Below are all of the <strong>DHCP</strong> syslog messages.
                            <hr>

                                <table class="table table-hover">
                                    <tr>
                                        <th>Recieved At</th>
                                        <th>Message</th>
                                    </tr>
                                    @foreach ($logs as $log)
                                    <tr>
                                        <td nowrap>{{ $log->ReceivedAt }}</td>
                                        <td>{{ $log->Message }}</td>
                                    </tr>
                                    @endforeach
                                </table>

			</div>
		</div>
	</div>
</div>
@endsection