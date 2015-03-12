@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Nodes Index Page</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <a href="/dashboard">
                                        <i class="fa fa-dashboard"></i> Dashboard
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-cloud"></i> AccessNodes
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Node Name</th>
                                        <th>Location</th>
                                        <th>Model</th>
                                        <th nowrap>Management IP</th>
                                        <th>Notes</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($nodes as $node)
                                        <tr>
                                            <td>{!! link_to_route('nodes.show', $node->name, $node->id ) !!}</td>
                                            <td nowrap>{{ $node->location }}</td>
                                            <td>{{ $node->model_number }}</td>
                                            <td>{{ $node->mgmt_ip }}</td>
                                            <td>{{ $node->notes }}</td>
                                            <td>
                                                <!-- {!! Form::model($node, ['route' => ['nodes.destroy', $node->id], 'method' => 'delete' ]) !!} -->
                                                {!! Form::model($node, ['route' => ['nodes.destroy', $node->id], 'method' => 'delete', 'onsubmit' => 'ConfirmDelete()']) !!}
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