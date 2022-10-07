<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = 
        [
            'Add patient', 'Edit patient', 'Delete patient', 'Add history', 'Edit history', 'Delete history', 
            'Add general examination', 'Edit general examination', 'Delete general examination', 
            'Add subclinical examination', 'Edit subclinical examination', 'Delete subclinical examination',
            'Edit medical record', 'Delete medical record',
            'Add hospital fee payment', 'Add appointment', 'Edit appointment', 'Cancel appointment', 'Delete appointment'
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
