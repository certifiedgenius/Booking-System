<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';
    
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email',
    ];
    
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
