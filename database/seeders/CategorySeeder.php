<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'IT',
                'description' => 'Информационные технологии'
            ],
            [
                'name' => 'Строительство',
                'description' => 'Строительные услуги'
            ],
            [
                'name' => 'Медицина',
                'description' => 'Медицинские услуги'
            ],
            [
                'name' => 'Торговля',
                'description' => 'Розничная и оптовая торговля'
            ]
        ]);
    }
}
