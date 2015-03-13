@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">
                                {!! link_to_route('nodes.index', 'Nodes', null, [
                                    'type' => 'button',
                                    'id' => 'myButton',
                                    'data-loading-text' => 'Loading...',
                                    'class' => 'btn btn-primary',
                                    'autocomplete' => 'off'
                                ]) !!}
			</div>
		</div>
	</div>
</div>
@endsection