<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Queue;

class QueueSeeder extends Seeder
{
    public function run()
    {
        Queue::factory()->create([
            'user_id' => 1, // Replace with a valid user ID
            'customer_name' => 'Reaeaqwe',
            'status' => 'Waiting',
        ]);
    }
}

