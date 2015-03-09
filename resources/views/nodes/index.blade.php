@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Nodes Index Page</div>

			<div class="panel-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Management IP</th>
                                        <th>Model</th>
                                        <th>Notes</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($nodes as $node)
                                        <tr>
                                            <td> {!! link_to_route('nodes.show', $node->name, $node->id ) !!}</td>
                                            <td nowrap>{{ $node->location }}</td>
                                            <td>{{ $node->mgmt_ip }}</td>
                                            <td>{{ $node->model_number }}</td>
                                            <td>{{ $node->notes }}</td>
                                            <td>{!! link_to_route('nodes.edit', 'Edit', $node->id, ['class' => 'btn btn-primary btn-xs']) !!}</td>
                                            <td>
                                                {!! Form::model($node, ['route' => ['nodes.destroy', $node->id], 'method' => 'delete' ]) !!}
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