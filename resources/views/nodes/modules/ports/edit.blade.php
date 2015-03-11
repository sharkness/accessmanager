@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Port Edit Page</div>

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
                                                <i class="fa fa-cloud"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes/{{ $node->id }}/modules/{{ $module->id }}">
                                                <i class="fa fa-cloud"></i> {{ $module->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-cloud"></i> Editing {{ $port->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                {!! Form::model($port, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id . '/modules/' . $module->id . '/ports/' . $port->id]) !!}
                                    @include('nodes.modules.ports._form', ['submitButtonText' => 'Update Port', 'nameAutofill' => $port->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection