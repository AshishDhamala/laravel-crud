@extends('layouts.common')

@section('title')
<title>Customer Lists</title>
@endsection

@section('content')
	
	<div class="row">
	<div class="col-sm-4 col-sm-offset-8">
	<!-- Right Side Of Navbar -->
    <ul class="logout_customer">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" role="button">{{ Auth::user()->name }}<span class="menu_below_icon">&nbsp;</span></a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    </div><!-- Column ends -->
    </div><!-- Row ends -->
    


	<div class="row">
	<div class="col-sm-12">
	<!-- if $lists has atleast one content then only show table -->
	<?php //date_default_timezone_set('GMT'); ?>
	@if(!empty($lists[0]))
	<table class="customers_list">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Number</th>
			<th>Email</th>
			<th>Created at</th>
			<th>Updated at</th>
			<th colspan="2">Others</th>
		</tr>
	</thead>
	<tbody>
		@foreach($lists as $list)
			@if(!empty($_SESSION['edited_customer']))
				@if($list->id == $_SESSION['edited_customer'])
				<tr class="customer_edited">
				@unset($_SESSION['edited_customer'])
				@endif
			@else
				<tr>
			@endif
					<td>{{$list->firstname}}</td>
					<td>{{$list->lastname}}</td>
					<td>{{$list->number}}</td>
					<td>{{$list->email}}</td>
					<td>{{$list->created_at}}</td>
					<td>{{$list->updated_at}}</td>
					<!-- <td><div class="edit_button"><a href="/customers/{{$list->id}}">Edit</a></div></td> -->
					<td><a class="btn btn-success" href="{{route('customer_edit', $list->id)}}">Edit</a></td>
					<td>
						<form action="{{route('customer_delete', $list->id)}}" method="POST">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<input class="btn btn-danger" type="submit" name="delete" value="Delete">
						</form>
					</td>
				</tr>
		@endforeach
	</tbody>
	</table>
	@endif
	<div class="create_button"><a class="btn btn-primary" href="{{route('customer_create')}}">Create New Customer</a></div>
	</div><!-- Column ends -->
    </div><!-- Row ends -->

    <div class="row">
    	<div class="col-sm-4">
    		<p>hello world.</p>
    	</div>
    </div>
@endsection
