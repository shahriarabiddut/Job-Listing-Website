<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $recruiter = [
            [
                'department_id' => '1',
                'name' => 'Recruiter 1',
                'email' => 'recruiter1@gmail.com',
                'password' => bcrypt('Password')
            ], [
                'department_id' => '2',
                'name' => 'Recruiter 2',
                'email' => 'recruiter2@gmail.com',
                'password' => bcrypt('Password')
            ]

        ];
        Recruiter::insert($recruiter);
    }
}
