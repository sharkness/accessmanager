@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Edit Page</div>
            
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
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-edit"></i> Editing {{ $module->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                {!! Form::model($module, ['method' => 'PATCH', 'url' => 'nodes/' . $node->id . '/modules/' . $module->id]) !!}
                                    @include('nodes.modules._form', ['submitButtonText' => 'Update Module', 'nameAutofill' => $module->name])
                                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection