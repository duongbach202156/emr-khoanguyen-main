<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public $menuActive = 'dashboardMenu';
    public $childMenuActive = 'childDashboardMenu';
    public function index()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        $patients = Patient::query()->get()->count();
        // lấy tổng tài khoản bác sĩ
        $role_doctor_id = Role::query()->where('name', 'Doctor')->first()->id;
        $doctor_accounts = DB::table('model_has_roles')->where('role_id', $role_doctor_id)->count();

        // lấy tổng tài khoản kỹ thuật viên
        $role_technician_id = Role::query()->where('name', 'Technicians')->first()->id;
        $technician_accounts = DB::table('model_has_roles')->where('role_id', $role_technician_id)->count();

        // Lấy tổng tài khoản y tá/điều dưỡng
        $role_nurse_id = Role::query()->where('name', 'Nurse')->first()->id;
        $nurse_accounts = DB::table('model_has_roles')->where('role_id', $role_nurse_id)->count();
        return view('dashboard', [
            'title' => 'Dashboard',
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
            'patients' => $patients,
            'doctor_accounts' => $doctor_accounts,
            'technician_accounts' => $technician_accounts,
            'nurse_accounts' => $nurse_accounts,
        ]);
    }
}
