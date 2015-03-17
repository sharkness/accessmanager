@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">Nodes Index Page</div>

                        <div class="panel-header">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <a href="/dashboard">
                                        <i class="fa fa-dashboard"></i> Dashboard
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-cloud"></i> Access Switches
                                </li>
                            </ol>
                        </div>

			<!--Sam's panels of switches... -->
				<div class="panel-body">
                @if ( ! count($nodes))
                    <h4>There are no access switches here.</h4>
                        You should {!! link_to_route('nodes.create', 'add an access switch') !!}.
                @elseif ( count($nodes))
					 @foreach ($nodes as $node)
					 
					<div class="col-sm-12 col-md-4 svgSwitchBox">
						<div class="well">
							<h3><i class="fa fa-tasks"></i>
								{!! link_to_route('nodes.show', $node->name, $node->id ) !!}
							</h3>

							<div class="well-sm">
							Location: {{ $node->location }}    
							Model: {{ $node->model_number }}   
							Management IP: {{ $node->mgmt_ip }}
							</div>
						</div> <!-- end containing well -->
					</div><!--end svgSwitchBox-->
					@endforeach
				</div><!--end panel-body-->
             @endif
			 
			 <div class="clearfix">******</div>
			
<!-- ************************************************************* -->
		</div><!--end line 6 panel-default-->
	</div><!--end line 5 col-md-12-->
</div>
@endsection