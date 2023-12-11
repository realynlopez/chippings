<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // You can modify this array with the roles you want to seed
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Customer'],
            // Add more roles as needed
        ];

        // Insert the roles into the database
        DB::table('roles')->insert($roles);
    }
}
