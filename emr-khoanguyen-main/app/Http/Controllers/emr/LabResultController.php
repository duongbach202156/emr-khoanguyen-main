<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Http\Requests\emr\BloodResultRequest;
use App\Models\HospitalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isNull;

class LabResultController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childLabResultMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        return view('admin.labresult.create', compact('menuActive', 'childMenuActive'));
    }
    public function selectSubclinicalPatient(Request $request)
    {
        // $lastest_subclinical = DB::table('subclinical_service')->where('patient_id', $request->selected_patient)->max('time');
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $request->selected_patient)->max('time');
        $selectedpatient = DB::table('subclinical_service')->where('patient_id', $request->selected_patient)->where('time', $lastest_hospitalhistory)->get();
        // Nếu bệnh nhân yêu cầu dịch vụ cls trong lần khám đó
        if(count($selectedpatient) != 0) {
            $request->session()->put('patient_id', $request->selected_patient);
            return redirect()->route('labresult.create');
        }
        else{
            Session::forget('patient_id');
            return redirect()->route('labresult.create'); 
        }
    }
    public function store(BloodResultRequest $request)
    {
        // dd($request->all());
        $user_auth = auth()->user()->id;
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $request->patient_id)->max('time');
        // Kiểm tra trước khi lưu thông tin xét nghiệm
        $selectedpatient = DB::table('subclinical_service')->where('patient_id', $request->patient_id)->where('time', $lastest_hospitalhistory)->where('name', 'Xét nghiệm máu')->get();
        if(count($selectedpatient) == 0) {
            return redirect()->route('labresult.create')->withErrors('Bệnh nhân chưa yêu cầu dịch vụ xét nghiệm');
        }

        $params = [
            'patient_id' => $request->patient_id,
            'time' => $lastest_hospitalhistory,
            'name' => $request->name_subclinical_service,
            'url' => $request->url,
            'comment' => $request->comment,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'creator_id' => $user_auth
        ];
        DB::beginTransaction();
        try {
            DB::table('lab_result')->insert($params);
            $lab_result_id = DB::table('lab_result')->latest()->first()->id;
            DB::table('blood_results')
            ->insert($request->merge(
                [
                    'lab_result_id' => $lab_result_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ])
                ->except(['patient_id', 'time', 'name', 'url', 'comment', 'name_subclinical_service', '_token'])
            );
            Session::flash('success', 'Thêm kết quả '.$request->name_subclinical_service.' thành công');
            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
        }
        return redirect()->route('labresult.create');
    }
}
