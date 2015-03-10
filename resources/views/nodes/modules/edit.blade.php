@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Edit Page</div>

			<div class="panel-body">
                                {!! Form::model($module, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id . '/modules/' . $module->id]) !!}
                                    @include('nodes.modules._form', ['submitButtonText' => 'Update Module', 'nameAutofill' => $module->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection