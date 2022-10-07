<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'time',
        'icd10_main_code',
        'icd10_sub_code',
        'diagnosis',
        'disease_prognosis',
        'disease_plan',
        'result_imaging',
        'result_lab',
        'creator_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
