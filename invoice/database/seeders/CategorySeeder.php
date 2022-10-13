<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Category 1',
                'slug' => 'category_1',
                'status' => true,
            ],
            [
                'name' => 'Category 2',
                'slug' => 'category_2',
                'status' => true,
            ],
            [
                'name' => 'Category 3',
                'slug' => 'category_3',
                'status' => true,
            ],
            [
                'name' => 'Category 4',
                'slug' => 'category_4',
                'status' => true,
            ],
            [
                'name' => 'Category 5',
                'slug' => 'category_5',
                'status' => true,
            ],
            [
                'name' => 'Category 6',
                'slug' => 'category_6',
                'status' => true,
            ]
        ]);
    }
}
