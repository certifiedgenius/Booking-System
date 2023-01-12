<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AppointmentController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointments.index', ['appointments' => Appointment::with(['customer', 'barber'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_first_name' => 'required|string|max:255',
            'customer_last_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'barber_first_name' => 'required|string|max:255',
            'barber_last_name' => 'required|string|max:255',
            'barber_email' => 'required|email|max:255',
            'barber_password' => 'required|string|min:6|confirmed',
            'barber_password_confirmation' => 'required|string|min:6',
            'barber_id' => 'required|integer',
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
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
 
    
    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Appointment not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'appointment' => $appointment,
        ], 200);
    }
    
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'string|max:255',
            'customer_email' => 'email|max:255',
            'customer_phone' => 'string|max:255',
            'barber_id' => 'exists:barbers,id',
            'date' => 'date',
            'start_time' => 'date_format:H:i',
            'duration' => 'integer',
            'notes' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $appointment = Appointment::findOrFail($id);

        if ($request->has('customer_name')) {
            $appointment->customer->name = $request->input('customer_name');
        }

        if ($request->has('customer_email')) {
            $appointment->customer->email = $request->input('customer_email');
        }

        if ($request->has('customer_phone')) {
            $appointment->customer->phone = $request->input('customer_phone');
        }

        if ($request->has('barber_id')) {
            $appointment->barber_id = $request->input('barber_id');
        }

        if ($request->has('date')) {
            $appointment->date = $request->input('date');
        }

        if ($request->has('start_time')) {
            $appointment->start_time = $request->input('start_time');
        }

        if ($request->has('duration')) {
            $appointment->duration = $request->input('duration');
        }

        if ($request->has('notes')) {
            $appointment->notes = $request->input('notes');
        }

        $appointment->save();

        return response()->json([
            'status' => 'success',
            'appointment' => $appointment,
        ], 200);
    }
}
