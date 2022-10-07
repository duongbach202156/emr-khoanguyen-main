<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\HospitalHistory;
use App\Models\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VitalController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childVitalMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        $patient_id = session()->get('patient_id');
        $max_hospital_history = HospitalHistory::where('patient_id', $patient_id)->max('time');
        if (!empty($patient_id)) {
            $vital = Vital::query()->where('patient_id', $patient_id)->where('time', $max_hospital_history)->orderBy('updated_at', 'DESC')->first();
        }
        else {
            $vital = '';
        }
        $patient_vital = Vital::where('patient_id', $patient_id);
        $lastest_visit_vital = $patient_vital->max('time');
        return view('admin.vital.create', compact('menuActive', 'childMenuActive', 'vital'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            'temperature' => ['required', 'numeric', 'max:60'],
            'height' => ['nullable', 'numeric', 'gt:0'],
            'weight' => ['nullable', 'numeric', 'gt:0'],
            'pulse' => ['nullable', 'numeric', 'gt:0'],
            'blood_pressure' => ['nullable', 'numeric', 'gt:0'],
            'respiration' => ['nullable', 'numeric', 'gt:0'],
            'systolic' => ['required', 'numeric', 'between:40,200'],
            'diastolic' => ['required', 'numeric', 'between:40,200'],
            'note' => ['nullable', 'max:255']
        ]);
        if($validated) {
            $user_auth = auth()->user()->id;
            $patient_vital = Vital::where('patient_id', $request->patient_id);
            $lastest_visit_vital = $patient_vital->max('time');

            // Check đã tạo lần khám nào chưa
            $checkFirstVisited = Vital::where('patient_id', $request->patient_id)->where('time', $lastest_visit_vital);
            $checkedFirstVisited = Vital::where('patient_id', $request->patient_id)->where('time', $lastest_visit_vital)->get();

            if(count($checkedFirstVisited) == 0) {
                return redirect()->route('vital.create')->withErrors('Chưa có lần khám nào được tạo');
            }
            try {
                $checkFirstVisited->update(array_merge($request->except(['_token', 'patient_id']), ['creator_id' => $user_auth]));
                Session::flash('success', 'Thêm sinh hiệu thành công, tiếp tục thủ tục');
            } catch (\Exception $err) {
                Session::flash('error', $err->getMessage());
                return redirect()->route('vital.create');
            }
            return redirect()->route('generalclinical.create');
            // dd($request->all());
        }
    }
}
