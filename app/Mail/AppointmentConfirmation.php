<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailable;



class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $appointment;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, Appointment $appointment)
    {
        $this->customer = $customer;
        $this->appointment = $appointment;
    }

    
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->view('emails.appointment_confirmation')
                        ->subject('Appointment Confirmation')
                        ->from('noreply@boogietime.com')
                        ->with([
                        'customer_first_name' => $this->customer->first_name,
                        'customer_last_name' => $this->customer->last_name,
                        'date' => $this->appointment->date,
                        'start_time' => $this->appointment->start_time,
                    ]); 
    }
}
