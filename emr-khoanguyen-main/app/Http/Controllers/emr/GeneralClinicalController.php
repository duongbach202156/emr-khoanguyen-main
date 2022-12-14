<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\GeneralClinical;
use App\Models\HospitalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GeneralClinicalController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childClinicalMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        $assigned_subclinical_services = [];
        $patient_id = session()->get('patient_id');
        $max_hospital_history = HospitalHistory::where('patient_id', $patient_id)->max('time');
        // $general_clinicals = 'j';
        if (!empty($patient_id)) {
            $assigned_services = DB::table('subclinical_service')->select('name')->where('patient_id', $patient_id)->where('time', $max_hospital_history)->get();
            foreach ($assigned_services as $assigned_service) {
                $assigned_subclinical_services[] = $assigned_service->name;
            }
            $general_clinicals = GeneralClinical::query()->where('patient_id', $patient_id)->where('time', $max_hospital_history)->orderBy('updated_at', 'DESC')->first();
        }
        else {
            $general_clinicals = '';
        }
        return view('admin.generalclinical.create', compact('menuActive', 'childMenuActive', 'assigned_subclinical_services', 'general_clinicals'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            // 'name_subclinical_service' => ['required'],
        ]);
        if($validated) {
            $user_auth = auth()->user()->id;
            $params = [
                'diagnosis_tuanhoan' => $request->diagnosis_tuanhoan,
                'diagnosis_hohap' => $request->diagnosis_hohap,
                'diagnosis_tieuhoa' => $request->diagnosis_tieuhoa,
                'diagnosis_than_tietnieu_sinhduc' => $request->diagnosis_than_tietnieu_sinhduc,
                'diagnosis_thankinh' => $request->diagnosis_thankinh,
                'diagnosis_coxuongkhop' => $request->diagnosis_coxuongkhop,
                'diagnosis_taimuihong' => $request->diagnosis_taimuihong,
                'diagnosis_ranghammat' => $request->diagnosis_ranghammat,
                'diagnosis_mat' => $request->diagnosis_mat,
                'diagnosis_noitiet_dinhduong_khac' => $request->diagnosis_noitiet_dinhduong_khac,
                'diagnosis_syndrome' => $request->diagnosis_syndrome,
                'creator_id' => $user_auth
            ];
            DB::beginTransaction();
            try {
                $patient_general = GeneralClinical::where('patient_id', $request->patient_id);
                $lastest_visit_general = $patient_general->max('time');
                // Check ???? t???o l???n kh??m n??o ch??a
                $checkFirstVisited = GeneralClinical::where('patient_id', $request->patient_id)->where('time', $lastest_visit_general);
                $checkedFirstVisited = $checkFirstVisited->get();
                if(count($checkedFirstVisited) == 0) {
                    return redirect()->route('generalclinical.create')->withErrors('Ch??a c?? l???n kh??m n??o ???????c t???o');
                }
                // C???p nh???t khi ???? t???n t???i l???n kh??m
                $checkFirstVisited->update($params);

                $subclinical_services = $request->name_subclinical_service;
                if (!empty($subclinical_services)) {
                    foreach($subclinical_services as $subclinical_service) {
                        DB::table('subclinical_service')->insert([
                            'patient_id' => $request->patient_id,
                            'name' => $subclinical_service,
                            'time' => $lastest_visit_general,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'creator_id' => $user_auth
                        ]);
                    }
                }
                
                Session::flash('success', 'Th??m kh??m l??m s??ng t???ng qu??t th??nh c??ng, ti???p t???c th??? t???c');
                DB::commit();
            } catch (\Exception $err) {
                DB::rollBack();
                Session::flash('error', $err->getMessage());
                return redirect()->route('generalclinical.create');
            }
            return redirect()->route('diagnosis.create');
            // dd($request->all());
        }
    }
}
