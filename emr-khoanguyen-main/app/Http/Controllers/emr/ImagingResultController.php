<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\HospitalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImagingResultController extends Controller
{
    public $menuActive = 'treatmentMenu';
    public $childMenuActive = 'childImagingMenu';
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        return view('admin.imagingresult.create', compact('menuActive', 'childMenuActive'));
    }
    public function imageSubclinicalPatient(Request $request)
    {
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $request->selected_patient)->max('time');
        
        $selectedpatient = DB::table('subclinical_service')->where('patient_id', $request->selected_patient)->where('time', $lastest_hospitalhistory)->get();
        if(count($selectedpatient) != 0) {
            $request->session()->put('patient_id', $request->selected_patient);
            return redirect()->route('imagingresult.create');
        }
        else{
            Session::forget('patient_id');
            return redirect()->route('imagingresult.create'); 
        }
    }
    public function store(Request $request)
    {
        $user_auth = auth()->user()->id;
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $request->patient_id)->max('time');
        // Kiểm tra trước khi lưu thông tin ảnh chụp
        $selectedpatient = DB::table('subclinical_service')->where('patient_id', $request->patient_id)->where('time', $lastest_hospitalhistory)->where('name', '<>', 'Xét nghiệm máu')->get();
        if(count($selectedpatient) == 0) {
            return redirect()->route('imagingresult.create')->withErrors('Bệnh nhân chưa yêu cầu dịch vụ chụp ảnh');
        }
        $validated = $request->validate([
            'patient_id' => ['bail','required', 'exists:patients,patient_id'],
            'name_subclinical_service' => ['required'],
            'url' => ['required', 'max:255'],
            'comment' => ['required'],
        ]);
        if($validated) {
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
            try {
                DB::table('imaging_result')->insert($params);
                Session::flash('success', 'Thêm kết quả chụp ảnh '. $request->name_subclinical_service .' thành công');
            } catch (\Exception $err) {
                Session::flash('error', $err->getMessage());
            }
            return redirect()->route('imagingresult.create');
            // dd($request->all());
        }
    }
}
