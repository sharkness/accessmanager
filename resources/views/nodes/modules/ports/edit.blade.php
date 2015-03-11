@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Port Edit Page</div>

			<div class="panel-body">
                                {!! Form::model($port, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id . '/modules/' . $module->id . '/ports/' . $port->id]) !!}
                                    @include('nodes.modules.ports._form', ['submitButtonText' => 'Update Port', 'nameAutofill' => $port->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection