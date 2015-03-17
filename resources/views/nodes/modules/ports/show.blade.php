@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
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
                                                <i class="fa fa-cloud"></i> Access Switches
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}">
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}/modules/{{ $module->id }}">
                                                <i class="fa fa-sitemap"></i> {{ $module->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-square"></i> {{ $port->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <h4><i class="fa fa-square"></i> Port Details [{!! link_to_route('nodes.modules.ports.edit', 'Edit', [$node->id, $module->id, $port->id]) !!}]</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        Name:  {{ $port->name }}<br>
                                        Port Number: {{ $port->port_number }}<br>
                                        Management IP: {{ $port->mgmt_ip }}<br>
                                        Notes: {{ $port->notes }}<br>
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
                                
                                <img src="/images/ping2.png">
                                
			</div>
		</div>
	</div>
</div>
@endsection