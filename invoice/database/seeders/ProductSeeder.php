<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::insert([
            [
                'name'=>'product name 1',
                'price'=>140,
                'company'=>'company 1',
                'details'=>'details 1',
                'quantity'=>12,
                'status'=>true,
            ],
            [
                'name'=>'product name 2',
                'price'=>150,
                'company'=>'company 2',
                'details'=>'details 2',
                'quantity'=>12,
                'status'=>true,
            ],
            [
                'name'=>'product name 3',
                'price'=>1670,
                'company'=>'company 3',
                'details'=>'details 3',
                'quantity'=>12,
                'status'=>true,
            ],
            [
                'name'=>'product name 4',
                'price'=>170,
                'company'=>'company 4',
                'details'=>'details 4',
                'quantity'=>12,
                'status'=>true,
            ],
            [
                'name'=>'product name 5',
                'price'=>180,
                'company'=>'company 5',
                'details'=>'details 5',
                'quantity'=>12,
                'status'=>true,
            ],
        ]);
    }
}
