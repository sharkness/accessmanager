@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Port Page For Switch {{ $node->name }} Card {{ $module->name}}</div>

			<div class="panel-body">
                                <h4>Add a Port</h4>
                                
                                {!! Form::open([
                                    'route' => ['nodes.modules.ports.store',
                                    $node->id, $module->id], 'id' => $module->id
                                    ]) !!}
                                    @include('nodes.modules.ports._form', ['submitButtonText' => 'Add Port', 'nameAutofill' => $module->name . '-'])
                                {!! Form::close() !!}
                                
			</div>
		</div>
	</div>
</div>
@endsection