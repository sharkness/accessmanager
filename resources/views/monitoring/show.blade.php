@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Network Monitoring</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Monitoring
                                </li>
                            </ol>
                        </div>

			<div class="panel-body">
                                <h4>Monitoring Page</h4>
                                {{ var_dump($nagiosHoststatus) }}
                                
			</div>
		</div>
	</div>
</div>
@endsection