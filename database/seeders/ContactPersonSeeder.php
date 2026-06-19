<?php

namespace Database\Seeders;

use App\Models\ContactPerson;
use Illuminate\Database\Seeder;

class ContactPersonSeeder extends Seeder
{
    public function run(): void
    {
        ContactPerson::insert([
            [
                'company_id' => 1,
                'full_name' => 'Иван Иванов',
                'phone' => '+79991112233',
                'email' => 'ivan@technoplus.ru',
                'position' => 'Директор',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'company_id' => 2,
                'full_name' => 'Петр Петров',
                'phone' => '+79994445566',
                'email' => 'petr@medservice.ru',
                'position' => 'Менеджер',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
