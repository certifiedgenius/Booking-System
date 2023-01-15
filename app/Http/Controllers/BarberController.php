<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class BarberController extends Controller
{

    
    /**
     * @return \Illuminate\Http\Response
     */
    // retrieve and display data from the application's database. 
    public function index()
    {
        $barbers = Barber::all();
        return view('admin.barbers.index', compact('barbers'));
    }

    
    
    
    /**
     * @return \Illuminate\Http\Response
     */
    // display a form for creating a new resource. 
    public function create()
    {
        return view('barbers.create');
    }

    
    
    
    /**
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    // validate, sanitize, and store the data entered by the user into the database. to handle requests to store a new resource.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:barbers,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $validator['password'] = bcrypt($validator['password']);

        Barber::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('admin.barbers.index')->with('success', 'Barber added successfully');
    }

    
    
    
    /**
     * @param  \App\Barber
     * @return \Illuminate\Http\Response
     */
    // retrieve and display the details of a specific resource, such as displaying the details of a specific customer. 
    public function show(Barber $barber)
    {
        return view('barbers.show', compact('barber'));
    }

    
    
    
    /**
     * @param  \App\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    // handle requests to display a form for editing a specific resource.
    public function edit(Barber $barber)
    {
        return view('barbers.edit', compact('barber'));
    }

    
    
    
    // validate, sanitize, and update the data entered by the user into the database for a specific resource.
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:barbers,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $barber = Barber::findOrFail($id);
        $barber->first_name = $request->input('first_name');
        $barber->last_name = $request->input('last_name');
        $barber->email = $request->input('email');

        if ($request->has('password')) {
            $barber->password = Hash::make($request->input('password'));
        }

        $barber->save();

        return response()->json([
            'status' => 'success',
            'barber' => $barber,
        ], 200);
    }
    
}
