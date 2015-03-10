@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Index Page For {{ $node->name }}</div>

			<div class="panel-body">
                                {!! link_to_route('nodes.show', 'Back', $node->id, ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('nodes.modules.create', 'Add Module to ' . $node->name, $node->id, ['class' => 'btn btn-primary']) !!}
                                <h5>Here are the modules for {{ $node->name }}</h5>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Slot Number</th>
                                        <th>Port Count</th>
                                        <th>Notes</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td nowrap>{!! link_to_route('nodes.modules.show', $module->name, [$node->id, $module->id]) !!}</td>
                                            <td>{{ $module->slot_number }}</td>
                                            <td>{{ $module->port_count }}</td>
                                            <td>{{ $module->notes }}</td>
                                            <td>{!! link_to_route('nodes.modules.edit', 'Edit', [$node->id, $module->id], ['class' => 'btn btn-primary btn-xs']) !!}</td>
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