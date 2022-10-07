<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'time',
        'temperature',
        'height',
        'weight',
        'pulse',
        'blood_group',
        'blood_type',
        'systolic',
        'diastolic',
        'blood_pressure',
        'respiration',
        'note',
        'creator_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
