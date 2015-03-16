@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Nodes Create Page</div>
            
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
                                            <i class="fa fa-edit"></i> Add new switch
                                        </li>
                                    </ol>
                                </div>

			<div class="panel-body">
                
                                    <h4>Add an Access Switch</h4>
                                    Add an Access Switch
                                    {!! Form::open(['route' => 'nodes.store']) !!}
                                        @include('nodes._form', ['submitButtonText' => 'Add Node', 'nameAutofill' => 'Switch name or nickname here'])
                                    {!! Form::close() !!}
				
			</div>
		</div>
	</div>
</div>
@endsection