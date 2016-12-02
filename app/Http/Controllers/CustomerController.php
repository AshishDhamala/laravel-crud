<?php

namespace App\Http\Controllers;
session_start();
// We have to use this here otherwise we will not be able to use Request class below
use Illuminate\Http\Request;

// We have to use this here otherwise we will not be able to use Customer::all() below
use App\Customer;

// Since, we are using Auth class below, so we should add this namespace
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
	public function customers_list() 
	{
		// gets all the data from the database with the name customers.
	    // $lists = Customer::all();

	    // Replace $lists = Customer::all(); with these two line codes
	    $user = Auth::user();			// This will help for user authentication
	    $lists = $user->customers;		// This will pass all the users under this user. We have used the name customers, since it is the name of the public function that we have created in the User class.

		return view('view_customers', compact('lists'));
	}

	public function create_customer()
	{
		return view('create_customer');
	}

	public function store(Request $request)
	{
		// This will send all the data from the form and assign to $data_from_customer_creation
		$data_from_customer_creation = $request->all();

		// Adds data to the database in the table customers
		// Customer::create($data_from_customer_creation);

		// Replace Customer::create($data_from_customer_creation); with these two line codes
		$user = Auth::user();
		$user->customers()->create($data_from_customer_creation);

		return redirect('/customers');
	}

	public function edit_customer($id) 
	{
		// $customer = Customer::where('id', $id)->first();

		// Replace $customer = Customer::where('id', $id)->first(); with these two line codes
		$user = Auth::user();
		$customer = $user->customers()->where('id', $id)->first();

		return view('edit_customer', compact('customer'));
	}

	public function update(Request $request, $id) 
	{
		// $customer = Customer::where('id', $id)->first();

		// Replace $customer = Customer::where('id', $id)->first(); with these two line codes
		$user = Auth::user();
		$customer = $user->customers()->where('id', $id)->first();

		$customer_data_to_be_edited = $request->all();
		$customer->update($customer_data_to_be_edited);

		$_SESSION['edited_customer'] = $id;

		return redirect('/customers');
	}

	public function destroy($id)
	{
		// $customer = Customer::where('id', $id)->first();

		// Replace $customer = Customer::where('id', $id)->first(); with these two line codes
		$user = Auth::user();
		$customer = Customer::where('id', $id)->first();

		$customer->delete();
		return redirect('/customers');
	}

}
