<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Package::insert([
            [
                'name' => 'Test',
                'description' => 'Тестовый пакет',
                'services_count' => 1,
                'price' => 0
            ],
            [
                'name' => 'Standard',
                'description' => 'Стандартный пакет',
                'services_count' => 5,
                'price' => 500
            ],
            [
                'name' => 'VIP',
                'description' => 'VIP пакет',
                'services_count' => 10,
                'price' => 1500
            ]
        ]);
    }
}
