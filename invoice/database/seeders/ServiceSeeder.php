<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            [
                'name'=>'Engine oil, Oil filter replace',
                'price'=>1000,
                'slug'=> 'Engine-oil-Oil-filter-replace',
                'category'=>1,
                'status'=>1
            ],
            [
                'name'=>'Air filter, Cabin/ac filter Cleaning',
                'price'=>1300,
                'slug'=> 'Air-filter-Cabin-ac-filter-Cleaning',
                'category'=>1,
                'status'=>1
            ],
            [
                'name'=>'Coolant, Gear oil, Brake fluid, Power Steering fluid, Wiper fluid top-up',
                'price'=>1600,
                'slug'=> 'Coolant-Gear oil-Brake-fluid-Power-Steering-fluid-Wiper-fluid top-up',
                'category'=>1,
                'status'=>1
            ],
            [
                'name'=>'Tire presser-rotation checking',
                'price'=>300,
                'slug'=> 'Tire-presser-rotation-checking',
                'category'=>1,
                'status'=>1
            ],
            [
                'name'=>'Computer Diagnostics Scanning',
                'price'=>900,
                'slug'=> 'Computer-Diagnostics-Scanning',
                'category'=>1,
                'status'=>1
            ]
        ]);
    }
}
