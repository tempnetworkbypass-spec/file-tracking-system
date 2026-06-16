<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Department::insert([
            [
                'name' => 'Administration',
                'code' => 'ADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Human Resources',
                'code' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finance',
                'code' => 'FIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Information Technology',
                'code' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
