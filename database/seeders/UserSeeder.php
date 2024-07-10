<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Muhammad Qalby',
            'email' => 'qolbymuhammad86@gmail.com',
            'password' => '$2y$12$97vOSCKdG8aUik.HtFsyJOOxxvxWhetmHvpFnCvtHNY8eVxtfybhO',
        ]);
        User::factory()->create([
            'name' => 'Obyy',
            'email' => 'obyy@gmail.com',
            'password' => '$2y$12$dtl.qKD27mkFJaj1GKT6KOdZ.PVM/QbpLmE78oRFze2qItUH/DnlC',
        ]);

        User::factory(20)->create();
    }
}