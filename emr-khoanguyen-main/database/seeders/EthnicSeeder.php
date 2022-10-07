<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ethnics')->insert([
            ['ethnic_id' => '01', 'name' => 'Ba na'],
            ['ethnic_id' => '02', 'name' => 'Bố y'],
            ['ethnic_id' => '03', 'name' => 'Brâu'],
            ['ethnic_id' => '04', 'name' => 'Chăm'],
            ['ethnic_id' => '05', 'name' => 'Chơ ro'],
            ['ethnic_id' => '06', 'name' => 'Chu ru'],
            ['ethnic_id' => '07', 'name' => 'Chứt'],
            ['ethnic_id' => '08', 'name' => 'Co'],
            ['ethnic_id' => '09', 'name' => 'Cống'],
            ['ethnic_id' => '10', 'name' => 'Cơ ho'],
            ['ethnic_id' => '11', 'name' => 'Cờ lao'],
            ['ethnic_id' => '12', 'name' => 'Dao'],
            ['ethnic_id' => '13', 'name' => 'Ê đê'],
            ['ethnic_id' => '14', 'name' => 'Gia rai'],
            ['ethnic_id' => '15', 'name' => 'Giấy'],
            ['ethnic_id' => '16', 'name' => 'Gié triêng'],
            ['ethnic_id' => '17', 'name' => 'H mông'],
            ['ethnic_id' => '18', 'name' => 'H rê'],
            ['ethnic_id' => '19', 'name' => 'Hà nhì'],
            ['ethnic_id' => '20', 'name' => 'Hoa'],
            ['ethnic_id' => '21', 'name' => 'K tu'],
            ['ethnic_id' => '22', 'name' => 'Kháng'],
            ['ethnic_id' => '23', 'name' => 'Khơ me'],
            ['ethnic_id' => '24', 'name' => 'Khơ mú'],
            ['ethnic_id' => '25', 'name' => 'Kinh'],
            ['ethnic_id' => '26', 'name' => 'La chí'],
            ['ethnic_id' => '27', 'name' => 'La ha'],
            ['ethnic_id' => '28', 'name' => 'La hù'],
            ['ethnic_id' => '29', 'name' => 'Lào'],
            ['ethnic_id' => '30', 'name' => 'Lô lô'],
            ['ethnic_id' => '31', 'name' => 'Lự'],
            ['ethnic_id' => '32', 'name' => 'M nông'],
            ['ethnic_id' => '33', 'name' => 'Ma'],
            ['ethnic_id' => '34', 'name' => 'Mảng'],
            ['ethnic_id' => '35', 'name' => 'Mường'],
            ['ethnic_id' => '36', 'name' => 'Ngái'],
            ['ethnic_id' => '37', 'name' => 'Nùng'],
            ['ethnic_id' => '38', 'name' => 'Ơ đu'],
            ['ethnic_id' => '39', 'name' => 'Pà thẻn'],
            ['ethnic_id' => '40', 'name' => 'Phú lá'],
            ['ethnic_id' => '41', 'name' => 'Pu péo'],
            ['ethnic_id' => '42', 'name' => 'Rag lai'],
            ['ethnic_id' => '43', 'name' => 'Rơ man'],
            ['ethnic_id' => '44', 'name' => 'Sán chay'],
            ['ethnic_id' => '45', 'name' => 'Sán rìu'],
            ['ethnic_id' => '46', 'name' => 'Si la'],
            ['ethnic_id' => '47', 'name' => 'Tà ôi'],
            ['ethnic_id' => '48', 'name' => 'Tày'],
            ['ethnic_id' => '49', 'name' => 'Thái'],
            ['ethnic_id' => '50', 'name' => 'Thổ'],
            ['ethnic_id' => '51', 'name' => 'Vân kiều'],
            ['ethnic_id' => '52', 'name' => 'X tiêng'],
            ['ethnic_id' => '53', 'name' => 'Xinh mun'],
            ['ethnic_id' => '54', 'name' => 'Xơ đăng'],
        ]);
    }
}
