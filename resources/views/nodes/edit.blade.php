@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Nodes Edit Page</div>
            
                                <div class="panel-header">
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <a href="/dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/nodes">
                                                <i class="fa fa-cloud"></i> Access Switches
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-edit"></i> Editing: {{ $node->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                {!! Form::model($node, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id]) !!}
                                    @include('nodes._form', ['submitButtonText' => 'Update Node', 'nameAutofill' => $node->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection