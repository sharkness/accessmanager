@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Nodes Edit Page</div>

			<div class="panel-body">
                                {!! Form::model($node, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id]) !!}
                                    @include('nodes._form', ['submitButtonText' => 'Update Node', 'nameAutofill' => $node->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection