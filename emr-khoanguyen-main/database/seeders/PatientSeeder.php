<?php

namespace Database\Seeders;

use App\Models\Patient;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Database\Seeder;
use Buihuycuong\Vnfaker\VNFaker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 100; $i++){
            $province_id = rand(1, 63);
            
            $districts = District::select('id')->where('province_id', $province_id)->get();
            $district_ids = [];
            foreach($districts as $district) {
                $district_ids[] = $district->id;
            }
            $district_id = $district_ids[array_rand($district_ids, 1)];
    
            $wards = Ward::select('id')->where('district_id', $district_id)->get();
            $ward_ids = [];
            foreach($wards as $ward) {
                $ward_ids[] = $ward->id;
            }
            $ward_id = $ward_ids[array_rand($ward_ids, 1)];
            unset($ward_ids);
            unset($district_ids);
            Patient::create([
                'patient_id' => 'BN' . date('Y') . date('m') . date('d') . $i . round(vnfaker()->numberBetween(10, 300)/rand(pi(), 8)),
                'full_name' => vnfaker()->fullname($word = rand(2, 4)),
                'email' => $i . vnfaker()->email(),
                'identity_number' => '0' . rand(0, 9) . rand(0, 9) . rand(0, 1) . rand(10000000, 99999999),
                'dob' => rand(1970, 2022) . '-' . vnfaker()->month() . '-' . vnfaker()->day(),
                'phone_patient' => vnfaker()->mobilephone($numbers = 10),
                'city_id' => $province_id,
                'district_id' => $district_id,
                'ward_id' => $ward_id
            ]);
        }
    }
}
