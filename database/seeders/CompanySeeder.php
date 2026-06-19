<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $company1 = Company::create([
            'user_id' => 1,
            'package_id' => 2,
            'name' => 'ООО ТехноПлюс',
            'address' => 'г. Краснодар, ул. Северная, 10',
            'phone' => '+79991112233',
            'fax' => '861123456',
            'email' => 'info@technoplus.ru',
            'website' => 'https://technoplus.ru',
            'description' => 'Поставка компьютерной техники',
            'logo' => 'logos/technoplus.png',
            'payment_due_date' => '2026-12-31',
            'is_approved' => true,
        ]);

        $company2 = Company::create([
            'user_id' => 1,
            'package_id' => 1,
            'name' => 'ООО МедСервис',
            'address' => 'г. Краснодар, ул. Красная, 25',
            'phone' => '+79994445566',
            'fax' => '861654321',
            'email' => 'office@medservice.ru',
            'website' => 'https://medservice.ru',
            'description' => 'Медицинские услуги',
            'logo' => 'logos/medservice.png',
            'payment_due_date' => null,
            'is_approved' => false,
        ]);

        $company1->categories()->attach([1, 4]);
        $company2->categories()->attach([3]);
    }
}
