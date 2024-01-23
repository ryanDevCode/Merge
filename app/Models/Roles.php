<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

     protected $fillable = [
        'role_name',
        'role_code',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_code', 'role_code');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->role_code = self::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        $code = self::max('id') + 1;

        return '10' . $code;
    }
}
