<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\HospitalHistory;
use App\Models\Patient;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryEmrController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childSummaryEmrMenu';
    public function index()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        $icd10s = DB::table('icd10')->orderBy('id', 'ASC')->get();
        $patient_id = session()->get('patient_id');
        if($patient_id != null){
            $patient = Patient::where('patient_id', $patient_id)->first();
            $hospitalhistory_times = HospitalHistory::select(['time'])->where('patient_id', $patient_id)->orderBy('time', 'desc')->get();
            
            return view('admin.summaryemr.index', compact('menuActive', 'childMenuActive', 'patient', 'icd10s', 'hospitalhistory_times'));
        }
        return view('admin.summaryemr.index', compact('menuActive', 'childMenuActive'));
    }
}
