<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailable;



class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;

    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->customer->appointment) {
            // access the appointment properties
            return $this->view('emails.appointment_confirmation')
                        ->subject('Appointment Confirmation')
                        ->from('sender@example.com')
                        ->with([
                            'customer_first_name' => $this->customer->first_name,
                            'customer_last_name' => $this->customer->last_name,
                            'date' => $this->customer->appointment->date,
                            'start_time' => $this->customer->appointment->start_time,
                        ]);
        } 
    }
}
