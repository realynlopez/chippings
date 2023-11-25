<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Daily transactions
        for ($i = 1; $i <= 5; $i++) {
            Transaction::create([
                'amount' => rand(100, 1000),
                'description' => "Daily Transaction $i",
                'transaction_date' => now()->subDays($i),
            ]);
        }

        // Monthly transactions
        for ($i = 1; $i <= 5; $i++) {
            Transaction::create([
                'amount' => rand(500, 2000),
                'description' => "Monthly Transaction $i",
                'transaction_date' => now()->subMonths($i),
            ]);
        }

        // Yearly transactions
        for ($i = 1; $i <= 5; $i++) {
            Transaction::create([
                'amount' => rand(1000, 5000),
                'description' => "Yearly Transaction $i",
                'transaction_date' => now()->subYears($i),
            ]);
        }
    }
}
