<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class them_dulieu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monhoc = [
            ['tenmh' => 'Trí tuệ nhân tạo', 'sotinchi' => 4],
            ['tenmh' => 'Truyền tin', 'sotinchi' => 4],
            ['tenmh' => 'Đồ họa', 'sotinchi' => 8],
            ['tenmh' => 'Đàm thoại', 'sotinchi' => 7],
            ['tenmh' => 'Vật lý nguyên tử', 'sotinchi' => 5],
            ['tenmh' => 'Văn Phạm', 'sotinchi' => 4],
            ['tenmh' => 'Vật lý đại cương', 'sotinchi' => 4],
            ['tenmh' => 'Triết học', 'sotinchi' => 6],
            ['tenmh' => 'Toán đại cương', 'sotinchi' => 4],
        ];
        try {
            foreach ($monhoc as $mh) {
                DB::table('monhoc')->insert($mh);
            }
        } catch (\Throwable $th) {
        }
    }
}
