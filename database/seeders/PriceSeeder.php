<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            [
                'start_at' => '2022-01-05',
                'end_at' => '2022-01-15',
                'price' => 5
            ],
            [
                'start_at' => '2022-01-01',
                'end_at' => '2022-01-11',
                'price' => 3
            ],
            [
                'start_at' => '2022-01-03',
                'end_at' => '2022-01-13',
                'price' => 10
            ],
            [
                'start_at' => '2022-01-02',
                'end_at' => '2022-01-11',
                'price' => 4
            ]
        ];

        Price::Insert($prices);
    }
}
