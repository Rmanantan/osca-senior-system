<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SeniorCitizen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@osca.test'],
            ['name' => 'OSCA Administrator', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'staff@osca.test'],
            ['name' => 'OSCA Staff', 'password' => Hash::make('password'), 'role' => 'staff']
        );

        SeniorCitizen::updateOrCreate(
            ['osca_id' => 'OSCA-0001'],
            [
                'first_name' => 'Juan',
                'middle_name' => 'D.',
                'last_name' => 'Sample',
                'birth_date' => '1950-05-10',
                'sex' => 'Male',
                'barangay' => 'Sample Barangay',
                'address' => 'Demo address',
                'contact_number' => '09000000000',
                'philhealth' => true,
                'pension_status' => 'Enrolled',
            ]
        );
    }
}
