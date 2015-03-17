@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                
                                <div class="panel-header">
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <a href="/dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="/support">
                                                <i class="fa fa-support"></i> Support
                                            </a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-support"></i> Create a New Support Ticket
                                        </li>
                                    </ol>
                                </div>

                                        <div class="panel-body">
                                            <h4>Create A Support Ticket</h4>
                                        <div class="alert alert-info alert-important">
                                            <strong>Note:</strong>  filling out this form will send a message to <a href="mailto:support@goldtelecom.com">support@goldtelecom.com</a>.<br>
                                            You can also contact support by calling <strong>(515)825-3400</strong>.
                                        </div>
		
                                                    {!! Form::open(['route' => 'support.store']) !!}
                                                    @include('support._form', ['submitButtonText' => 'Open Ticket'])
                                                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
