@extends('layouts.common')

@section('title')
<title>Create customer</title>
@endsection

@section('content')
	<form class="create_customer" action="/customers" method="POST">
		<!-- to protect our site from cross site forgery -->
		{{csrf_field()}}

		<div class="form_tne">
			<input type="text" name="firstname" placeholder="Enter first name">
			<input type="text" name="lastname" placeholder="Enter last name"><br />
			<input type="number" name="number" placeholder="Enter number">
			<input type="email" name="email" placeholder="Enter email">
		</div>
		<div class="form_submit">
			<input type="submit" name="submit" value="Create">
		</div>
	</form>
@endsection