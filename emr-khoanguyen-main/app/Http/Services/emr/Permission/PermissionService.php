<?php

namespace App\Http\Services\Emr\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function getAllRole()
    {
        return Role::orderByDesc('id')->paginate(10)->withQueryString();
    }

    public function getPatientPermission()
    {
        return Permission::orderBy('id')->limit(3)->get();
    }

    public function getHistoryPermission()
    {
        return Permission::orderBy('id')->offset(3)->limit(3)->get();
    }

    public function getGeneralExamPermission()
    {
        return Permission::orderBy('id')->offset(6)->limit(3)->get();
    }

    public function getSubExamPermission()
    {
        return Permission::orderBy('id')->offset(9)->limit(3)->get();
    }

    public function getMedRecordPermission()
    {
        return Permission::orderBy('id')->offset(12)->limit(2)->get();
    }

    public function getPayPermission()
    {
        return Permission::orderBy('id')->offset(14)->limit(1)->get();
    }
    public function getAppointPermission()
    {
        return Permission::orderBy('id')->offset(15)->limit(4)->get();
    }

    // Lưu Role và cấp quyền cho role
    public function store($request)
    {
        try {
            DB::beginTransaction();
            $role = Role::create([
                'name' => $request->name,
            ]);
            if(isset($request->permissions)){
                foreach($request->permissions as $permission) {
                    $role->givePermissionTo($permission);
                }
            }
            DB::commit();
            Session::flash('success', 'Tạo nhóm quyền thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    // Lấy Role theo ID
    public function getRoleFromID($id)
    {
        return Role::findOrFail($id);
    }

    // Cập nhật nhóm quyền
    public function update($request,$id)
    {
        try {
            DB::beginTransaction();
            Role::where('id', $id)->update([
                'name' => $request->name,
            ]);
            $role = Role::findOrFail($id);
            $role->syncPermissions($request->permissions);
            DB::commit();
            Session::flash('success', 'Cập nhật nhóm quyền thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    // Xóa Nhóm quyền
    public function destroy($request)
    {
        $id = $request->id;
        $role = Role::where('id', $id)->first();
        if($role) {
            Role::destroy($id);
            return true;
        }

        return false;
    }
}
