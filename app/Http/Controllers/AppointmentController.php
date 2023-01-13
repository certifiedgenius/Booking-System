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
    
    // retrieve and display data from the application's database.
    public function index()
    {
        return view('admin.appointments.index', ['appointments' => Appointment::with(['customer', 'barber'])->get()]);
    }

    
    /**
     * Store a newly created resource in storage. 
     *
     * @return \Illuminate\Http\Response
     */
    
    // validate, sanitize, and store the data entered by the user into the database. to handle requests to store a new resource. 
    public function store(Request $request)
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
        
        // Save the appointment to the database
        $appointment->save();
        
        // Redirect the user to a success page
        return redirect('/user/appointments/create');

        /*
        return response()->json([
            'status' => 'success',
            'appointment' => $appointment,
        ], 201);
        */
        
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // display a form for creating a new resource. 
    public function create(Request $request)
    {
        $barbers = Barber::all();
        return view('user.appointments.create', compact('barbers'));
    }
 
    // retrieve and display the details of a specific resource, such as displaying the details of a specific customer.
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
    
    // validate, sanitize, and update the data entered by the user into the database for a specific resource.
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
