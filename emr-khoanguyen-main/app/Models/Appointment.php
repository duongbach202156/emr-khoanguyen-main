<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'address',
        'gender',
        'services',
        'more_info',
        'email_verified_at',
        'token'
    ];
}
