<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Buihuycuong\Vnfaker\VNFaker;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'patient_id' => 'BN' . date('Y') . date('m') . date('d') . vnfaker()->mobilephone($numbers = 3),
            // 'full_name' => vnfaker()->fullname($word = rand(2, 4)),
            // 'email' => vnfaker()->email(),
            // 'identity_number' => '0' . rand(0, 9) . rand(0, 9) . rand(0, 1) . rand(10000000, 99999999),
            // 'phone_patient' => vnfaker()->mobilephone($numbers = 10),
        ];
    }
}
