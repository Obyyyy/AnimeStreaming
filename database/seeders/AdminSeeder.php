<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Obyy-Admin',
                'email' => 'obyy@admin.com',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Admin1',
                'email' => 'admin1@admin.com',
                'password' => Hash::make('admin123'),
            ],
        ];

        foreach($admins as $admin)
        {
            Admin::create($admin);
        }
    }
}