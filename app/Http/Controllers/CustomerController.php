<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    
    // retrieve and display data from the application's database.
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', ['customers' => $customers]);

        return response()->json([
            'status' => 'success',
            'customers' => $customers,
        ], 200);
    }

    // retrieve and display the details of a specific resource, such as displaying the details of a specific customer.
    public function show(Customer $customer)
    {
        return response()->json([
            'status' => 'success',
            'customer' => $customer,
        ], 200);
    }

    // validate, sanitize, and store the data entered by the user into the database. to handle requests to store a new resource.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        return response()->json([
            'status' => 'success',
            'customer' => $customer,
        ], 201);
    }

    // validate, sanitize, and update the data entered by the user into the database for a specific resource.
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $customer->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        return response()->json([
            'status' => 'success',
            'customer' => $customer,
        ], 200);
    }

    // delete a specific resource from the database.
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Customer deleted',
        ], 200);
    }
}
