@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Nodes Create Page</div>

			<div class="panel-body">
                
                                    <h4>AccessNodes Create Page</h4>
                                    Add an AccessNode
                                    {!! Form::open(['route' => 'nodes.store']) !!}
                                        @include('nodes._form', ['submitButtonText' => 'Add Node', 'nameAutofill' => 'Switch name or nickname here'])
                                    {!! Form::close() !!}
				
			</div>
		</div>
	</div>
</div>
@endsection