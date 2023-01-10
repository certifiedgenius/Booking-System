<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function appointments()
    {
        $appointments = Appointment::all();
        return view('admin.appointments', compact('appointments'));
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }

    public function barbers()
    {
        $barbers = Barber::all();
        return view('admin.barbers', compact('barbers'));
    }
}
