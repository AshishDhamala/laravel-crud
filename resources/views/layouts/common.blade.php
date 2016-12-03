<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<!-- asset() method will concatinate the passed variable with the path of public. -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/customer.css')}}">
</head>
<body>
	
	<div class="container-fluid">
		@yield('content')
	</div>

<script type="text/javascript" src="{{asset('js/jquery-1.4.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>