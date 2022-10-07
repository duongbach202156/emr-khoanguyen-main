<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\HospitalHistory;
use App\Models\Patient;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $patient_id = session('patient_id');
        if($patient_id == null)
        {
            return redirect()->back()->withErrors('Chưa có bệnh nhân nào được chọn');
        }
        $hospitalhistory_times = HospitalHistory::select(['time'])->where('patient_id', $patient_id)->orderBy('time', 'asc')->get();
        // dd($hospitalhistory_times);
        $patient_info = Patient::where('patient_id', $patient_id)->first();
        $pdf = Pdf::loadView('pdf.noikhoa', compact('patient_info', 'hospitalhistory_times'));
        // return view('pdf.noikhoa', compact('patient_info', 'hospitalhistory_times'));
        return $pdf->stream('BA'. time() .'.pdf');
    }

    public function pdf_emr()
    {
        
    }
}
