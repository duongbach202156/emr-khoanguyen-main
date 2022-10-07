<?php

namespace App\Http\Services\Emr\Account;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccountService
{
    public function getAll()
    {
        return User::orderByDesc('id')->paginate(10)->withQueryString();
    }
    
    public function getAllRole()
    {
        return Role::orderByDesc('id')->get();
    }

    public function getOne($id)
    {
        return User::findOrFail($id);
    }

    // Thêm tài khoản
    public function store($accountRequest)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $accountRequest->name,
                'email' => $accountRequest->email,
                'password' =>bcrypt($accountRequest->password),
            ]);
            $user->assignRole($accountRequest->roles);
            DB::commit();
            Session::flash('success', 'Thêm tài khoản thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
    
    // Cập nhật tài khoản
    public function update($accountRequest, $id)
    {
        DB::beginTransaction();
        try {
            User::where('id', $id)->update([
                'name' => $accountRequest->name,
                'email' => $accountRequest->email,
            ]);
            $user = User::findOrFail($id);
            $user->syncRoles($accountRequest->roles);
            DB::commit();
            Session::flash('success', 'Sửa tài khoản thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    // Xóa tài khoản
    public function destroy($request)
    {
        $id = $request->id;
        $account = User::where('id', $id)->first();
        if($account) {
            User::destroy($id);
            return true;
        }

        return false;
    }
}
