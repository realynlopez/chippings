<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        // Add other fields as needed
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
