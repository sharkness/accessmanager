@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Index Page For {{ $node->name }}</div>
            
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
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-sitemap"></i> Modules
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <h5><i class="fa fa-sitemap"></i> Here are the modules for {{ $node->name }}</h5>
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

			</div>
		</div>
	</div>
</div>
@endsection