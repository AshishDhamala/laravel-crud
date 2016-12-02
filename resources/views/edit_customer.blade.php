@extends('layouts.common')

@section('title')
<title>Edit customer</title>
@endsection

@section('content')
	<form class="create_customer" action="/customers/{{$customer->id}}" method="POST">
		<!-- to protect our site from cross site forgery -->
		{{csrf_field()}}
		{{method_field('PUT')}}

		<div class="form_tne">
			<input type="text" name="firstname" value="{{$customer->firstname}}">
			<input type="text" name="lastname" value="{{$customer->lastname}}"><br>
			<input type="number" name="number" value="{{$customer->number}}">
			<input type="email" name="email" value="{{$customer->email}}">
		</div>
		<div class="form_submit">
			<input type="submit" name="submit" value="Update">
		</div>
	</form>
@endsection