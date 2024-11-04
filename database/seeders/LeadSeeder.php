<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        //for first and custom seeder
        // Lead::create([
        //         'name' => 'Mr. Aman',
        //         'email' => 'aman@bizency.com',
        //         'phone' => '+91 9090908989',
        //         'address' => 'c-432, vijay park, Delhi, India',
        //         'message' => 'hi this is seeder Lead',
        //         'status' => 'new',
        //     ]);

        Lead::factory(40)->create();
    }
}
