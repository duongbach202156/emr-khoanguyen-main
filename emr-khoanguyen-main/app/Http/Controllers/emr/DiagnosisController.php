<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\HospitalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DiagnosisController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childDiagnosisMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        $icd10s = DB::table('icd10')->orderBy('id', 'ASC')->get();
        $patient_id = session()->get('patient_id');
        $max_hospital_history = HospitalHistory::where('patient_id', $patient_id)->max('time');
        if (!empty($patient_id)) {
            $diagnosis = Diagnosis::query()->where('patient_id', $patient_id)->where('time', $max_hospital_history)->orderBy('updated_at', 'DESC')->first();
        }
        else {
            $diagnosis = '';
        }
        return view('admin.diagnosis.create', compact('menuActive', 'childMenuActive', 'icd10s', 'diagnosis'));
    }
    public function store(Request $request)
    {
        $user_auth = auth()->user()->id;
        $validated = $request->validate([
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            'icd10_main_code' => ['required'],
            'diagnosis' => ['required', 'max:255'],
            'disease_plan' => ['required', 'max:255'],
        ]);
        if($validated) {
            $params = [
                "patient_id" => $request->patient_id,
                "icd10_main_code" => $request->icd10_main_code,
                "icd10_sub_code" => $request->icd10_sub_code,
                "diagnosis" => $request->diagnosis,
                "disease_prognosis" => $request->disease_prognosis,
                "disease_plan" => $request->disease_plan,
                'creator_id' => $user_auth
            ];
            try {
                $patient_diagnosis = Diagnosis::where('patient_id', $request->patient_id);
                $lastest_visit = $patient_diagnosis->max('time');
                // Check đã tạo lần khám nào chưa
                $checkFirstVisited = Diagnosis::where('patient_id', $request->patient_id)->where('time', $lastest_visit);
                $checkedFirstVisited = $checkFirstVisited->get();
                if(count($checkedFirstVisited) == 0) {
                    return redirect()->route('diagnosis.create')->withErrors('Chưa có lần khám nào được tạo');
                }
                
                $checkFirstVisited->update($params);
                Session::flash('success', 'Thêm kết quả chẩn đoán thành công, tiếp tục thủ tục');
            } catch (\Exception $err) {
                Session::flash('error', $err->getMessage());
                return redirect()->route('diagnosis.create');
            }
            return redirect()->route('diagnosis.create');
            // dd($request->all());
        }
    }
}
