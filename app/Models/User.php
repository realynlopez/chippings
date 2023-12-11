<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Assuming you have a 'role_id' column in your users table
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole(string $role)
    {
        return $this->role && is_object($this->role) && $this->role->name === $role;
    }

    public static function getNewUsers()
    {
        return self::where('created_at', '>=', now()->subDays(7))->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function isAdmin()
    {
        // Assuming 'admin' is a column in your roles table
        return $this->role && is_object($this->role) && $this->role->name === 'admin';
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
