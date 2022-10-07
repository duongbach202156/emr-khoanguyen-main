<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'time',
        'date_attented',
        'date_admitted',
        'admit_dept',
        'refer_dept',
        'symptoms',
        'reason',
        'reason_date',
        'disease_self',
        'disease_family',
        'disease_relateto_relateto_diung',
        'disease_relateto_diung_time',
        'disease_relateto_matuy',
        'disease_relateto_matuy_time',
        'disease_relateto_ruoubia',
        'disease_relateto_ruoubia_time',
        'disease_relateto_thuocla',
        'disease_relateto_thuocla_time',
        'disease_relateto_khac',
        'disease_relateto_khac_time',
        'creator_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
