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
            'password' => '$2y$12$6Gqri8dRNuokSIN6MeUhR.OuUl622q98O6x75.5kloqoAYbzvvtPy',
        ]);

        User::factory(20)->create();
    }
}