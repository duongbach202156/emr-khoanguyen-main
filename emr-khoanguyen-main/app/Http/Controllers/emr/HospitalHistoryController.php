<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\GeneralClinical;
use App\Models\HospitalHistory;
use App\Models\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SubclinicalService;

use function PHPUnit\Framework\isNull;

class HospitalHistoryController extends Controller
{
    public $menuActive = 'patientMenu';
    public $childMenuActive = 'childHospitalHistoryMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        return view('admin.hospitalhistory.create', compact('menuActive', 'childMenuActive'));
    }

    public function store(Request $request)
    {
        $user_auth = auth()->user()->id;
        // dd(array_merge($request->except('_token'), ['creator_id' => $user_auth]));
        $validated = $request->validate([
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            'date_attented' => ['required'],
            'date_admitted' => ['required'],
            'admit_dept' => ['required'],
            'symptoms' => ['nullable', 'max:255'],
            'reason' => ['required', 'max:255'],
            'reason_date' => ['nullable', 'numeric', 'max:100'],
            'disease_relateto_diung_time' => ['nullable', 'numeric', 'max:100'],
            'disease_relateto_thuocla_time' => ['nullable', 'numeric', 'max:100'],
            'disease_relateto_matuy_time' => ['nullable', 'numeric', 'max:100'],
            'disease_relateto_khac_time' => ['nullable', 'numeric', 'max:100'],
            'disease_relateto_ruoubia_time' => ['nullable', 'numeric', 'max:100'],
        ]);

        if($validated) {
            $visited_patient = HospitalHistory::where('patient_id', $request->patient_id);
            $info_visit = [
                'patient_id' => $request->patient_id,
                'time' => 1,
            ];
            
            if(!empty($visited_patient->first())) {
                $nearest_visit = $visited_patient->max('time');
                $lastest_visit = array_merge($request->except('_token'), 
                    [
                        'time' => $nearest_visit + 1,
                        'creator_id' => $user_auth
                    ]
                );
                $info_visit['time'] = $nearest_visit + 1;
                DB::beginTransaction();
                try {
                    HospitalHistory::create($lastest_visit);
                    Vital::create($info_visit);
                    GeneralClinical::create($info_visit);
                    Diagnosis::create($info_visit);
                    DB::commit();
                    Session::flash('success', 'Thêm lịch sử khám thành công, tiếp tục thủ tục');
                } catch (\Exception $err) {
                    DB::rollBack();
                    Session::flash('error', $err->getMessage());
                    return redirect()->route('hospital-history.create');
                }
                return redirect()->route('vital.create');
            }

            // Nếu là bệnh nhân mới
            DB::beginTransaction();
            try {
                HospitalHistory::create(array_merge($request->except('_token'), ['creator_id' => $user_auth]));
                Vital::create($info_visit);
                GeneralClinical::create($info_visit);
                Diagnosis::create($info_visit);
                DB::commit();
                Session::flash('success', 'Thêm lịch sử khám thành công, tiếp tục thủ tục');
            } catch (\Exception $err) {
                DB::rollBack();
                Session::flash('error', $err->getMessage());
                return redirect()->route('hospital-history.create');
            }
            return redirect()->route('vital.create');
            // dd($request->all());
        }
    }
}
