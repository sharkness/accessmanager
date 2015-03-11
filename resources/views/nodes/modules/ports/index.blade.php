@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Ports Index Page</div>

			<div class="panel-body">
                                {!! link_to_route('nodes.modules.show', 'Back', [$node->id, $module->id], ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('nodes.modules.ports.create', 'Add Ports for this module', [$node->id, $module->id], ['class' => 'btn btn-primary']) !!}
                                <h5>You are viewing ports in module {{ $module->name }} for node {{ $node->name }}</h5>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Port Name</th>
                                        <th>Port Number</th>
                                        <th>Notes</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($ports as $port)
                                        <tr>
                                            <td>{!! link_to_route('nodes.modules.ports.show', $port->name, [$node->id, $module->id, $port->id]) !!}</td>
                                            <td>{{ $port->number }}</td>
                                            <td>{{ $port->notes }}</td>
                                            <td>{!! link_to_route('nodes.modules.ports.edit', 'Edit', [$node->id, $module->id, $port->id], ['class' => 'btn btn-primary btn-xs']) !!}</td>
                                            <td>
                                                {!! Form::model($port, ['route' => ['nodes.modules.ports.destroy', $node->id, $module->id, $port->id], 'method' => 'delete' ]) !!}
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