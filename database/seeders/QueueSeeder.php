<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed some initial data
        DB::table('queues')->insert([
            ['customer_name' => 'John Doe', 'status' => 'Waiting'],
            ['customer_name' => 'Jane Smith', 'status' => 'In Progress'],
            // Add more seed data as needed
        ]);
    }
}
