<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Barber;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    //
    public function create (Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = Customer::create([
            'name' => $request->input('customer_name'),
            'email' => $request->input('customer_email'),
            'phone' => $request->input('customer_phone'),
        ]);

        $appointment = Appointment::create([
            'customer_id' => $customer->id,
            'barber_id' => $request->input('barber_id'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'notes' => $request->input('notes'),
        ]);

        return response()->json([
            'status' => 'success',
            'appointment' => $appointment,
        ], 201);
    }
}
