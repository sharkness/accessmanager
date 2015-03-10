@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Create Page For {{ $node->name }}</div>

			<div class="panel-body">
                                <h4>Add a Module</h4>
                                
                                {!! Form::open([
                                    'route' => ['nodes.modules.store',
                                    $node->id], 'id' => $node->id
                                    ]) !!}
                                    @include('nodes.modules._form', ['submitButtonText' => 'Add Module', 'nameAutofill' => $node->name . '-'])
                                {!! Form::close() !!}
                                
			</div>
		</div>
	</div>
</div>
@endsection