<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sliderseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sliders')->insert(
            [
                [
                    'type' => 'New Arrivals',
                    'title' => "Men's Fashion",
                    'banner' => 'frontend/images/slider_1.jpg',
                    'starting_price' => '99',
                    'btn_url' => 'http://ecommerce.test/',
                    'serial' => 1,
                    'status' => 1
                ],
                [
                    'type' => 'New Arrivals',
                    'title' => "Kids's Fashion",
                    'banner' => 'frontend/images/slider_2.jpg',
                    'starting_price' => '49.00',
                    'btn_url' => 'http://ecommerce.test/',
                    'serial' => 2,
                    'status' => 1
                ],
                [
                    'type' => 'New Arrivals',
                    'title' => "Winter Collection",
                    'banner' => 'frontend/images/slider_3.jpg',
                    'starting_price' => '99',
                    'btn_url' => 'http://ecommerce.test/',
                    'serial' => 3,
                    'status' => 1
                ]
            ]
        );
    }
}
