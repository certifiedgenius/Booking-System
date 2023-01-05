<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class BookingController extends Controller
{
    //
    public function create (Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'customer_first_name' => 'required|string|max:255',
            'customer_last_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'barber_first_name' => 'required|string|max:255',
            'barber_last_name' => 'required|string|max:255',
            'barber_email' => 'required|email|max:255',
            'barber_password' => 'required|string|min:6',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|default:60',
            'text' => 'nullable|string',
        ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors(),
        ], 422);
    }

    $customer = Customer::create([
        'first_name' => $request->input('customer_first_name'),
        'last_name' => $request->input('customer_last_name'),
        'email' => $request->input('customer_email'),
        'phone' => $request->input('customer_phone'),
    ]);
    
    $barber = Barber::create([
        'first_name' => $request->input('barber_first_name'),
        'last_name' => $request->input('barber_last_name'),
        'email' => $request->input('barber_email'),
        'password' => Hash::make($request->input('barber_password')),
    ]);

    $appointment = Appointment::create([
        'customer_id' => $customer->id,
        'barber_id' => $request->input('barber_id'),
        'date' => $request->input('date'),
        'start_time' => $request->input('start_time'),
        'duration' => $request->input('duration'),
        'text' => $request->input('text'),
    ]);

        return response()->json([
            'status' => 'success',
            'appointment' => $appointment,
        ], 201);
    }
}
