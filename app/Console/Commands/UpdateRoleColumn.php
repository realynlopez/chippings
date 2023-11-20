<?php

namespace App\Console\Commands;

// app/Console/Commands/UpdateRoleColumn.php

use Illuminate\Console\Command;
use App\Models\User;

class UpdateRoleColumn extends Command
{
    protected $signature = 'update:role';

    public function handle()
    {
        User::whereNull('role')->update(['role' => 'customer']);
        $this->info('Role column updated successfully.');
    }
}
