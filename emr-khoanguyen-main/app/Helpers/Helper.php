<?php

namespace App\Helpers;

use App\Models\Diagnosis;
use App\Models\GeneralClinical;
use App\Models\HospitalHistory;
use App\Models\Patient;
use App\Models\User;
use App\Models\Vital;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class Helper
{
    public static function getPatientAddress($province_id, $district_id, $ward_id, $home_address)
    {
        // dd(($home_address));
        $html = '';
        if($home_address != null) {
            $html .= $home_address . ', ';
        }
        if($district_id != null && $province_id != null && $ward_id != null) {
            $ward = Ward::where('id', $ward_id)->first()->name;
            $district = District::where('id', $district_id)->first()->name;
            $province = Province::where('id', $province_id)->first()->name;
            $html .= $ward . ', ' . $district . ', ' . $province;
        }
        return $html;
    }

    public static function getPatientInfo($patient_id)
    {
        $html = '';
        $patient = Patient::where('patient_id', $patient_id)->first();
        if(!empty($patient)) {
            $html .= $patient->patient_id .'-'. $patient->full_name .'-'. self::getPatientAddress($patient->city_id, $patient->district_id, $patient->ward_id, $patient->home_address);
            return $html;
        }
        $html .= 'Bệnh nhân không tồn tại, vui lòng chọn lại';
        return $html;
    }
    
    public static function getEthnicName($id)
    {
        if($id != null){
            $ethnic = DB::table('ethnics')->where('ethnic_id', $id)->first()->name;
            return $ethnic;
        }
        return '';

    }

    public static function getIcd10Name($code)
    {
        if($code != null){
            $icd10_name = DB::table('icd10')->where('code', $code)->first()->name;
            return $icd10_name;
        }
        return '';

    }

    public static function getLabResultLink($patient_id) {
        $html = '';
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $patient_id)->max('time');
        $lastest_LabResult = DB::table('lab_result')->where('patient_id', $patient_id)->max('time');
        // Nếu chưa có kết quả lần khám mới nhất
        if($lastest_hospitalhistory != $lastest_LabResult) {
            $html .= 'Chưa có kết quả xét nghiệm lần khám '. $lastest_hospitalhistory;
        }
        $time_results = DB::table('lab_result')->select(['time'])->where('patient_id', $patient_id)->groupBy('time')->orderBy('time', 'desc')->get();
        if(count($time_results) > 0){
            foreach ($time_results as $time_result) {
                // dd($time_result);
                $html .= '<div class="text-info">Kết quả xét nghiệm lần khám ' . $time_result->time .'</div>';
                $url_results = DB::table('lab_result')->select(['url'])->where('patient_id', $patient_id)->where('time', $time_result->time)->orderBy('created_at', 'desc')->get();
                foreach($url_results as $url_result) {
                    $html .= '<a target="_blank" href="'. $url_result->url .'">
                                <img style="width:250px; height:250px;margin-bottom: 10px" src="'. $url_result->url .'" alt="photo">
                            </a>';
                }
            }
        }
        return $html;

        // $times = DB::table('lab_result')->select(['time'])->where('patient_id', $patient_id)->groupBy('time')->orderBy('time', 'desc')->get();
        // if (count($times) > 0) {
        //     foreach ($times as $time) {
        //         $html = '<div class="text-info">Kết quả xét nghiệm lần khám ' . $time->time .'</div>';
        //         $lab_results = DB::table('lab_result')->select(['url', 'name', 'creator_id', 'created_at'])->where('patient_id', $patient_id)->where('time', $time->time)->orderBy('created_at', 'desc')->get();
        //         if(count($lab_results) > 0){
        //             foreach($lab_results as $lab_result) {
        //                 $creator_name = User::where('id', $lab_result->creator_id)->first()->name; 
        //                 $html .= '<i>Người cập nhật: <b>'. $creator_name .'</b></i><br>';
        //                 $html .= '<i>Thời gian: <b>'. $lab_result->created_at .'</b></i><br>';
        //                 $html .= '<a target="_blank" href="'. $lab_result->url .'">
        //                             <figure>
        //                                 <img style="width:250px; height:250px" src="'. $lab_result->url .'" alt="photo">
        //                                 <figcaption><i>Kết quả: <b>'. $lab_result->name .'</b></i></figcaption>
        //                             </figure>
        //                         </a>';
        //             }
        //             return $html;
        //         }
        //         return $html .= 'Chưa có kết quả Xét nghiệm lần khám '. $time->time;

        //     }
        // }
        
    }
    public static function getImagingResultLink($patient_id) {
        $html = '';
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $patient_id)->max('time');
        $lastest_ImagingResult = DB::table('imaging_result')->where('patient_id', $patient_id)->max('time');
        // Nếu chưa có kết quả lần khám mới nhất
        if($lastest_hospitalhistory != $lastest_ImagingResult) {
            $html .= 'Chưa có kết quả ảnh chụp lần khám '. $lastest_hospitalhistory;
        }
        $time_results = DB::table('imaging_result')->select(['time'])->where('patient_id', $patient_id)->groupBy('time')->orderBy('time', 'desc')->get();
        if(count($time_results) > 0){
            foreach ($time_results as $time_result) {
                // dd($time_result);
                $html .= '<div class="text-info">Kết quả ảnh chụp lần khám ' . $time_result->time .'</div>';
                $url_results = DB::table('imaging_result')->select(['url'])->where('patient_id', $patient_id)->where('time', $time_result->time)->orderBy('created_at', 'desc')->get();
                foreach($url_results as $url_result) {
                    $html .= '<a target="_blank" href="'. $url_result->url .'">
                                <img style="width:250px; height:250px;margin-bottom: 10px" src="'. $url_result->url .'" alt="photo">
                            </a>';
                }
            }
        }
        return $html;

        // $times = DB::table('imaging_result')->select(['time'])->where('patient_id', $patient_id)->groupBy('time')->orderBy('time', 'desc')->get();
        // if (count($times) > 0) {
        //     foreach ($times as $time) {
        //         $html = '<div class="text-info">Kết quả ảnh chụp lần khám ' . $time->time .'</div>';
        //         $image_results = DB::table('imaging_result')->select(['url', 'name', 'creator_id', 'created_at'])->where('patient_id', $patient_id)->where('time', $time->time)->orderBy('created_at', 'desc')->get();
        //         if(count($image_results) > 0){
        //             foreach($image_results as $image_result) {
        //                 $creator_name = User::where('id', $image_result->creator_id)->first()->name;
        //                 $html .= '<i>Người cập nhật: <b>'. $creator_name .'</b></i><br>';
        //                 $html .= '<i>Thời gian: <b>'. $image_result->created_at .'</b></i><br>';
        //                 $html .= '<figure><a target="_blank" href="'. $image_result->url .'">
        //                             <img style="width:250px; height:250px;" src="'. $image_result->url .'" alt="photo">
        //                             <figcaption><i>Kết quả: <b>'. $image_result->name .'</b></i></figcaption>
        //                         </a></figure>';
        //             }
        //             return $html;
        //         }
        //         return $html .= 'Chưa có kết quả ảnh chụp lần khám '. $time->time;
        //     }
        // }
    }

    public static function checkLabService($patient_id)
    {
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $patient_id)->max('time');
        // Nếu lần khám cls khác lịch sử khám mới nhất thì xóa session và trả về false
        $selectedservices = DB::table('subclinical_service')->where('patient_id', $patient_id)->where('time', $lastest_hospitalhistory)->where('name', 'Xét nghiệm máu')->get();
        if(count($selectedservices) == 0)
        {
            return false;
        }
        return $selectedservices;
    }

    public static function checkImageService($patient_id)
    {
        $lastest_hospitalhistory = HospitalHistory::where('patient_id', $patient_id)->max('time');
        // Nếu lần khám cls khác lịch sử khám mới nhất thì xóa session và trả về false
        $selectedservices = DB::table('subclinical_service')->where('patient_id', $patient_id)->where('time', $lastest_hospitalhistory)->where('name', '<>', 'Xét nghiệm máu')->get();
        if(count($selectedservices) == 0)
        {
            return false;
        }
        return $selectedservices;
    }

    public static function getHistoryWithTime($patient_id, $time)
    {
        $history = HospitalHistory::where('patient_id', $patient_id)->where('time', $time)->with('creator')->orderBy('created_at', 'DESC')->first();
        if(!empty($history)) return $history;
        return false;
    }

    public static function getVitalWithTime($patient_id, $time)
    {
        $vital = Vital::where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'DESC')->first();
        if(!empty($vital)) return $vital;
        return false;
    }

    public static function getGeneralWithTime($patient_id, $time)
    {
        $general = GeneralClinical::where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'DESC')->first();
        if(!empty($general)) return $general;
        return false;
    }

    public static function getSubClinicWithTime($patient_id, $time)
    {
        $sub_clinical_services = DB::table('subclinical_service')->select('name')->where('patient_id', $patient_id)->where('time', $time)->get()->toArray();
        if(count($sub_clinical_services) != 0) return $sub_clinical_services;
        return false;
    }

    public static function getDiagnosisWithTime($patient_id, $time)
    {
        $diagnosis = Diagnosis::where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'DESC')->first();
        if(!empty($diagnosis)) return $diagnosis;
        return false;
    }

    // Lấy kết quả xét nghiệm view tổng kết bệnh án
    public static function getLabResultLink2($patient_id, $time) {
        $html = '<div class="text-info">Kết quả xét nghiệm lần khám ' . $time .'</div>';
        $lab_results = DB::table('lab_result')->select(['url', 'name', 'creator_id', 'created_at'])->where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'desc')->get();
        if(count($lab_results) > 0){
            foreach($lab_results as $lab_result) {
                $creator_name = User::where('id', $lab_result->creator_id)->first()->name; 
                $html .= '<i>Người cập nhật: <b>'. $creator_name .'</b></i><br>';
                $html .= '<i>Thời gian: <b>'. $lab_result->created_at .'</b></i><br>';
                $html .= '<a target="_blank" href="'. $lab_result->url .'">
                            <figure>
                                <img style="width:250px; height:250px" src="'. $lab_result->url .'" alt="photo">
                                <figcaption><i>Kết quả: <b>'. $lab_result->name .'</b></i></figcaption>
                            </figure>
                        </a>';
            }
            return $html;
        }
        return $html .= 'Chưa có kết quả Xét nghiệm lần khám '. $time;
        
    }
    // Lấy kết quả ảnh chụp view tổng kết bệnh án
    public static function getImagingResultLink2($patient_id, $time) {
        
        $html = '<div class="text-info">Kết quả ảnh chụp lần khám ' . $time .'</div>';
        $image_results = DB::table('imaging_result')->select(['url', 'name', 'creator_id', 'created_at'])->where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'desc')->get();
        if(count($image_results) > 0){
            foreach($image_results as $image_result) {
                $creator_name = User::where('id', $image_result->creator_id)->first()->name;
                $html .= '<i>Người cập nhật: <b>'. $creator_name .'</b></i><br>';
                $html .= '<i>Thời gian: <b>'. $image_result->created_at .'</b></i><br>';
                $html .= '<figure><a target="_blank" href="'. $image_result->url .'">
                            <img style="width:250px; height:250px;" src="'. $image_result->url .'" alt="photo">
                            <figcaption><i>Kết quả: <b>'. $image_result->name .'</b></i></figcaption>
                        </a></figure>';
            }
            return $html;
        }
        return $html .= 'Chưa có kết quả ảnh chụp lần khám '. $time;
    }

    public static function getBloodResult($patient_id, $time)
    {
        $image_results = DB::table('lab_result')->select('id')->where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'desc')->get();
        $lab_result_ids = [];
        foreach ($image_results as $image_result) {
            $lab_result_ids[] = $image_result->id;
        }
        return DB::table('blood_results')->whereIn('lab_result_id', $lab_result_ids)->get();
    }

    public static function getLabResult($patient_id, $time)
    {
        $lab_results = DB::table('lab_result')->where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'desc')->get();
        return $lab_results;
    }
    
    public static function getImagingResult($patient_id, $time)
    {
        $image_results = DB::table('imaging_result')->where('patient_id', $patient_id)->where('time', $time)->orderBy('created_at', 'desc')->get();
        return $image_results;
    }

    public static function countImages($table, $patient_id, $time, $type)
    {
        $countImages = DB::table($table)->where('patient_id', $patient_id)->where('name', $type)->where('time', $time)->get()->count();
        // dd($countImages);
        return $countImages;
    }
}
