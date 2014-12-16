<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Thomas Nguyen | @yield('title') </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="/js/tablesorter/themes/blue/style.css"> <!-- tablesorter blue theme -->
	</head>

	<body>
		@if(Session::get('flash_message'))
			<div class="flash-message alert alert-info" role="alert">
				{{ Session::get('flash_message') }}
			</div>
		@endif

		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Inventory Management</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					@if(Auth::check())
					<ul class="nav navbar-nav small pull-right">
						<li><a href='/product'> Products </a></li>
						<li><a href='/company'> Companies </a></li>
						<li><a href='/logout'> Log out {{ Auth::user()->email; }} </a></li>
					</ul>
					@else
					<ul class="nav navbar-nav small pull-right">
						<li><a href='/signup'> Sign up </a> </li>
						<li><a href='/login'> Log in </a></li> 
					</ul>
					@endif
				</div>
			</div>
		</div> <!-- END navbar -->

		<br><br><br>


		<div class="container">
			<div class="page-header text-center">
				<h1> @yield('title') </h1>
			</div>
			</div>
		</div>

		<div class="container">
			@yield('content')
		</div>

		<div class="footer">
			<br><br>
		</div>
	</body>




	<!-- JavaScript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/tablesorter/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="/js/tablesorter/jquery.tablesorter.widgets.js"></script>

	<script>
		$(document).ready(function() { 
			$("#myTable").tablesorter({
				sortList  : [[0,0]]		
			});
		
			$("#datepicker").datepicker();
		}); 
	</script>

</html>



