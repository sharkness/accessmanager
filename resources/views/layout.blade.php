<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Goldfield Telecom ONT Manager</title>

    <!-- Goat's Custom CSS -->
    <link href="/css/goat.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->        

</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/nodes">Goldfield Telecom ONT Manager</a>
            </div>
            <!-- Top Menu Items -->            
        	<ul class="nav navbar-nav navbar-right">
        		@if (Auth::guest())
        			<li><a href="/auth/login">Login</a></li>
        			<li><a href="/auth/register">Register</a></li>
        		@else
        			<li class="dropdown">
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
        				<ul class="dropdown-menu" role="menu">
        					<li><a href="/auth/logout">Logout</a></li>
        				</ul>
        			</li>
        		@endif
        	</ul>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> AccessNetwork <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/nodes">View Access Swithes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/monitoring"><i class="fa fa-fw fa-binoculars"></i> Monitoring</a>
                    </li>
                    <li>
                        <a href="/logs"><i class="fa fa-fw fa-book"></i> Logs</a>
                    </li>
                    <li>
                        <a href="/dhcp"><i class="fa fa-link"></i> DHCP Server</a>
                    </li>
                    <li>
                        <a href="/tftp"><i class="fa fa-archive"></i> TFTP Server</a>
                    </li>
                    <li>
                        <a href="/support"><i class="fa fa-fw fa-support"></i> Support</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

@yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Scripts -->        
        <!-- jQuery -->
        <script src="/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="/js/plugins/morris/raphael.min.js"></script>
        <!-- <script src="/js/plugins/morris/morris.min.js"></script>
        <script src="/js/plugins/morris/morris-data.js"></script> -->
            
        <!-- Script to confirm deletes -->
        <script src="/js/app.js"></script>
        <!-- Script to make buttons say "Loading..." when they are clicked -->
        <script src="/js/button-loading.js"></script>
    
</body>
</html>
