<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title> Thomas Nguyen | @yield('title') </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>

	@if(Session::get('flash_message'))
		<div class="flash-message alert alert-info" role="alert">
			{{ Session::get('flash_message') }}
		</div>
	@endif

<nav class="navbar-default">
	@if(Auth::check())
	<div class="container">
			<ul class="nav navbar-nav navbar-right small">
				<li class="pull-right">
					<a href='/logout'> Log out {{ Auth::user()->email; }} </a>
				</li>
			</ul>
	</div>
	@endif
</nav>

<br>

<!-- BEGIN pill navbar -->
	<div class="container">
		<ul class="nav nav-pills pull-left">
			@if(Auth::check())
			<li role="presentation"><a href='/'> Home </a></li>
			<li role="presentation"><a href='/product'> Products </a></li>
			<li role="presentation"><a href='/company'> Companies </a></li>
			@else
			<li role="presentation"><a href='/'> Home </a></li>
			<li role="presentation"><a href='/signup'>Sign up</a> </li>
			<li role="presentation"><a href='/login'>Log in</a></li> 
			@endif
		</ul>
	</div>
<!-- END pill navbar -->

<br>

<div class="container">

	<div class="row">
		<div class="jumbotron">
			<h2> Inventory Management System </h2>
			<h3>@yield('title')</h3>
		</div>	
	</div>


	@yield('content')


	<div class="footer">
		<br><br>
	</div>

</div><!--container-->

</body>
</html>