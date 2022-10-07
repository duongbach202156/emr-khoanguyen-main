<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Super Admin', 'Admin', 'Doctor', 'Nurse', 'Receptionist', 'Technicians'];
        foreach($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Gán tất cả các quyền cho super admin
        $permissions = 
        [
            'Add patient', 'Edit patient', 'Delete patient', 'Add history', 'Edit history', 'Delete history', 
            'Add general examination', 'Edit general examination', 'Delete general examination', 
            'Add subclinical examination', 'Edit subclinical examination', 'Delete subclinical examination',
            'Edit medical record', 'Delete medical record',
            'Add hospital fee payment', 'Add appointment', 'Edit appointment', 'Cancel appointment', 'Delete appointment'
        ];
        foreach($permissions as $permission) {
            $role = Role::findByName('Super Admin');
            $role->givePermissionTo($permission);
        }

    }
}
