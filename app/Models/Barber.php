<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;
    
    protected $table = 'barbers';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
