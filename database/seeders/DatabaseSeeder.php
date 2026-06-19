<?php

namespace Database\Seeders;

use App\Models\Captcha;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PackageSeeder::class,
            CategorySeeder::class,
            CompanySeeder::class,
            ContactPersonSeeder::class,
            EmailConfirmationSeeder::class,
            CaptchaSeeder::class,
        ]);
    }
}
