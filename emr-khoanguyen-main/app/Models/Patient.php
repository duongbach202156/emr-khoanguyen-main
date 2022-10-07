<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'title',
        'full_name',
        'email',
        'identity_number',
        'phone_patient',
        'occupation',
        'sex',
        'dob',
        'nationality',
        'ethnic_id',
        'religion',
        'city_id',
        'district_id',
        'ward_id',
        'home_address',
        'marital_status',
        'name_next_of_kin',
        'home_next_of_kin',
        'phone_next_of_kin',
        'type_of_object',
        'health_insurance_id',
        'health_insurance_date',
        'creator_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
