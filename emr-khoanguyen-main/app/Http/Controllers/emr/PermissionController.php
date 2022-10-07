<?php

namespace App\Http\Controllers\emr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Emr\Permission\PermissionService;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    protected $permissionService;
    public $menuActive = 'accountMenu';
    public $childMenuActive = 'childPermissionMenu';
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function index()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = $this->childMenuActive;
        return view('admin.permissions.list', [
            'roles' => $this->permissionService->getAllRole(),
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
        ]);
    }
    public function create()
    {
        $menuActive = $this->menuActive;
        $childMenuActive = '';
        return view('admin.permissions.add', [
            'patientPermissions' => $this->permissionService->getPatientPermission(),
            'historyPermissions' => $this->permissionService->getHistoryPermission(),
            'generalExamPermissions' => $this->permissionService->getGeneralExamPermission(),
            'subExamPermissions' => $this->permissionService->getSubExamPermission(),
            'medicalRecordPermissions' => $this->permissionService->getMedRecordPermission(),
            'paymentPermissions' => $this->permissionService->getPayPermission(),
            'appointmentPermissions' => $this->permissionService->getAppointPermission(),
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
        ]);
        if($validated) {
            $this->permissionService->store($request);
            return redirect()->route('permission.index');
        }
    }

    public function edit($id)
    {  
        $menuActive = $this->menuActive;
        $childMenuActive = '';
        return view('admin.permissions.edit', [
            'patientPermissions' => $this->permissionService->getPatientPermission(),
            'generalExamPermissions' => $this->permissionService->getGeneralExamPermission(),
            'subExamPermissions' => $this->permissionService->getSubExamPermission(),
            'medicalRecordPermissions' => $this->permissionService->getMedRecordPermission(),
            'paymentPermissions' => $this->permissionService->getPayPermission(),
            'appointmentPermissions' => $this->permissionService->getAppointPermission(),
            'role' => $this->permissionService->getRoleFromID($id),
            'menuActive' => $menuActive,
            'childMenuActive' => $childMenuActive,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required'],
        ]);
        if($validated) {
            $this->permissionService->update($request, $id);
            return redirect()->route('permission.index');
        }
    }

    public function show($id)
    {
        
    }

    public function destroy(Request $request)
    {
        $result = $this->permissionService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Thành Công'
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
