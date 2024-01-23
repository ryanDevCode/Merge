<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    protected $fillable = [
        'status_name',
    ];

    public function budgets()
    {
        return $this->hasMany(Budgets::class, 'budget_status', 'status_code');
    }

    public function addBudget()
    {
        return $this->hasMany(Budgets::class, 'request_status', 'status_code');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($status) {
            $status->status_code = self::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        $code = self::max('id') + 1;

        return 'S' . $code;
    }
}
