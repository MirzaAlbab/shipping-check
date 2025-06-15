<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couriers = [
            ['name' => 'JNE', 'code' => 'jne'],
            ['name' => 'TIKI', 'code' => 'tiki'],
            ['name' => 'POS Indonesia', 'code' => 'pos'],
            ['name' => 'Gojek', 'code' => 'gojek'],
            ['name' => 'Grab', 'code' => 'grab'],
        ];

        Courier::insertOrIgnore($couriers);

    }
}
