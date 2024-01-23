<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
    ];

    public function budgets(){

        return $this->hasMany(Budgets::class, 'budget_category', 'category_code');
    }

    public function addBudgets(){

        return $this->hasMany(AddBudgets::class, 'add_budget_category', 'category_code');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($categories) {
            $categories->category_code = self::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        $code = self::max('id') + 1;

        return 'C' . $code;
    }

}
