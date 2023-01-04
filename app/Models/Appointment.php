<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $table = 'appointments';
    
    protected $fillable = [
        'customer_id', 'barber_id', 'date', 'start_time', 'duration', 'text', 
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
