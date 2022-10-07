<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralClinical extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'time',
        'diagnosis_tuanhoan',
        'diagnosis_hohap',
        'diagnosis_tieuhoa',
        'diagnosis_than_tietnieu_sinhduc',
        'diagnosis_thankinh',
        'diagnosis_coxuongkhop',
        'diagnosis_taimuihong',
        'diagnosis_ranghammat',
        'diagnosis_mat',
        'diagnosis_noitiet_dinhduong_khac',
        'diagnosis_syndrome',
        'name_subclinical_service',
        'creator_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
