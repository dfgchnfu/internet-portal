<?php

namespace Database\Seeders;

use App\Models\Captcha;
use Illuminate\Database\Seeder;

class CaptchaSeeder extends Seeder
{
    public function run(): void
    {
        Captcha::insert([
            [
                'word' => 'PORTAL',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'word' => 'COMPANY',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'word' => 'BUSINESS',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
