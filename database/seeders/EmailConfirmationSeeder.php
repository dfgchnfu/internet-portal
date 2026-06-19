<?php

namespace Database\Seeders;

use App\Models\EmailConfirmation;
use Illuminate\Database\Seeder;

class EmailConfirmationSeeder extends Seeder
{
    public function run(): void
    {
        EmailConfirmation::insert([
            [
                'user_id' => 1,
                'token' => 'ABC123TOKEN',
                'confirmed' => true,
                'sent_at' => now(),
                'confirmed_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
