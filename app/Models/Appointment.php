<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id', 'barber_id', 'date', 'start_time', 'duration', 'timestamps', 'notes',
    ];
}
