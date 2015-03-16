@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Modules Create Page For {{ $node->name }}</div>

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
                                            <a href="/nodes/{{ $node->id }}">
                                                <i class="fa fa-tasks"></i> {{ $node->name }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-edit"></i> Add a card to {{ $node->name }}
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                                <h4>Add a Card</h4>
                                
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