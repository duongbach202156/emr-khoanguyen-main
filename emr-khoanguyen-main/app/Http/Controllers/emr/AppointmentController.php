<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\emr\appointment\AppointmentRequest;
use App\Mail\Appointment as MailAppointment;
use App\Models\Patient;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Helpers;
use App\Helpers\Helper;

class AppointmentController extends Controller
{
    public $menuActive = 'appointmentMenu';
    public $childMenuActive = 'childNewAppointmentMenu';
    public function showPatientAccepted()
    {   
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        return view('admin.appointments.homeVerified', [
            'appointmentVerifieds' => Appointment::where('email_verified_at', '!=', null)->orderByDesc('updated_at')->paginate(10)->withQueryString(),
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
        ]);
    }

    public function showPatientPending()
    {
        // dd(count(Appointment::where('email_verified_at', '!=', null)->get()));
        $menuActive = $this->menuActive;
        $childMenuActive = 'childPendingAppointmentMenu';
        return view('admin.appointments.home', [
            'paginatePendings' => Appointment::where('email_verified_at', null)->orderByDesc('created_at')->paginate(10)->withQueryString(),
            'appointmentPendings' => Appointment::where('email_verified_at', null)->get(),
            'paginateVerifieds' => Appointment::where('email_verified_at', '!=', null)->orderByDesc('updated_at')->get(),
            'appointmentVerifieds' => Appointment::where('email_verified_at', '!=', null)->get(),
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
        ]);
    }

    public function index()
    {
        $generalInfoActive = 'generalInfoActive';
        $appointmentActive = 'appointmentActive';
        return view('web.appointment.index', compact('generalInfoActive', 'appointmentActive'));
    }

    public function store(AppointmentRequest $appointmentRequest)
    {
        // dd($appointmentRequest->all());
        if(!empty($appointmentRequest->services)) {
            $services = implode(', ', $appointmentRequest->services);
        } else {
            $services = '';
        }
        $token = Str::random(64);
        try{
            DB::beginTransaction();
            Appointment::create([
                'name' => $appointmentRequest->name,
                'email' => $appointmentRequest->email,
                'phone' => $appointmentRequest->phone,
                'date' => $appointmentRequest->date,
                'time' => $appointmentRequest->time,
                'address' => $appointmentRequest->address,
                'gender' => $appointmentRequest->gender,
                'services' => $services,
                'more_info' => $appointmentRequest->more_info,
                'token' => $token
            ]);
            $new_appointment = Appointment::where('token', $token)->first();
            if(!empty($new_appointment)){
                Mail::to($appointmentRequest->email)->send(new MailAppointment($new_appointment));
            }
            DB::commit();
            return redirect()->route('appointmentPatient.index')->withSuccess('Ki???m tra tin nh???n ?????n email');

        } catch(\Exception $err) {
            DB::rollBack();
            return redirect()->route('appointmentPatient.index')->withErrors($err->getMessage());
        }

    }
    public function checkTimeOut($createdTokenTime)
    {
        if(time() - strtotime($createdTokenTime) <= 60*5) {
            return true;
        } 
        return false;
    }
    // X??? l?? ?????t l???ch v?? hi???n th??? k???t qu???
    public function appointmentProcess($token)
    {
        $generalInfoActive = 'generalInfoActive';
        $appointmentActive = 'appointmentActive';
        $appointment = Appointment::where('token', $token);
        if(!empty($appointment->first())){
            if($this->checkTimeOut($appointment->first()->created_at)){
                try{
                    $update = $appointment->update(['email_verified_at' => Carbon::now()]);
                    Session::flash('success', '?????t l???ch th??nh c??ng');
                } catch(\Exception $err) {
                    Session::flash('error', $err->getMessage());
                }   
                return view('web.appointment.appointmentverified', compact('generalInfoActive', 'appointmentActive'));
            } else {
                return view('web.appointment.appointmentverified', [
                    'timeout' => 'Link h???t h???n',
                    'generalInfoActive' => $generalInfoActive,
                    'appointmentActive' => $appointmentActive,
                ]);
            }
        } else {
            return abort(404);
        }
    }

    public function addNewPatient(Request $request)
    {
        $checkExistPatient = Patient::where('email', $request->get('email'))->get();
        $validated = $request->validate([
            'full_name' => ['required','max:255'],
            'email' => ['required', 'email'],
            'phone_patient' => ['bail', 'required', 'numeric'],
            'identity_number' => ['bail', 'required', 'min:12', 'max:12'],
        ]);
        $checkExistPatient = Patient::where('email', $request->get('email'))->first();
        // N???u b???nh nh??n ???? t???n t???i
        if(!empty($checkExistPatient)) {
            $message = 'B???nh nh??n c?? ?????a ch??? email: '.$checkExistPatient->email.' ???? t???n t???i: '. Helper::getPatientInfo($checkExistPatient->patient_id);
            return redirect()->route('appointment.showPatientAccepted')->withErrors($message);
        }

        // N???u l?? b???nh nh??n m???i
        if($validated) {
            $patient_id = 'BN' . time();
            $params = [
                'patient_id' => $patient_id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'identity_number' => $request->identity_number,
                'phone_patient' => $request->phone_patient,
                'sex' => $request->sex,
            ]; 
            $new_patient = new Patient($params);
            if($new_patient->save()){
                $id = Patient::where('email', $request->get('email'))->first()->id;
                return redirect()->route('patient.edit', $id)->withSuccess('Th??m b???nh nh??n m???i th??nh c??ng. C???p nh???t th??m th??ng tin');
            }
            return redirect()->route('appointment.showPatientAccepted')->withErrors('C?? l???i, th??? l???i sau.');
        }
    }
}
