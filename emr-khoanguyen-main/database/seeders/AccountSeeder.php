<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Buihuycuong\Vnfaker\VNFaker;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(25)->create();
        $emails = ['superadmin@emr.com', 'admin@emr.com', 'doctor@emr.com', 'nurse@emr.com', 'technician@emr.com', 'receptionist@emr.com'];
        foreach ($emails as $email) {
            User::create([
                'name' => vnfaker()->fullname($word = 2),
                'email' => $email,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'), // password
                'remember_token' => Str::random(10),
            ]);
        }

        User::where('email', 'superadmin@emr.com')->first()->assignRole('Super Admin');
        User::where('email', 'admin@emr.com')->first()->assignRole('Admin');
        User::where('email', 'doctor@emr.com')->first()->assignRole('Doctor');
        User::where('email', 'nurse@emr.com')->first()->assignRole('Nurse');
        User::where('email', 'technician@emr.com')->first()->assignRole('Technicians');
        User::where('email', 'receptionist@emr.com')->first()->assignRole('Receptionist');
    }
}
