<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<!-- asset() method will concatinate the passed variable with the path of public. -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/customer.css')}}">
</head>
<body>
	
	@yield('content')

</body>
</html>