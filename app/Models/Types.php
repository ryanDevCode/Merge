<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'type_name',
    ];

    public function balances()
    {
        return $this->hasMany(Balance::class, 'balance_type', 'type_code');
    }

    public function budgets()
    {
        return $this->hasMany(Budgets::class, 'budget_type', 'type_code');
    }

    public function addbudgets()
    {
        return $this->hasMany(Addbudgets::class, 'request_type', 'type_code');
    }

    public function inventoryTurnovers()
    {
        return $this->hasMany(Turnover::class, 'turnover_type', 'type_code');
    }

    public function incomeStatements()
    {
        return $this->hasMany(Income::class, 'income_type', 'type_code');
    }

    public function cashflowStatements()
    {
        return $this->hasMany(Cashflow::class, 'cashflow_type', 'type_code');
    }

    public function salesReports()
    {
        return $this->hasMany(Sales::class, 'sales_type', 'type_code');
    }

    public function accountsPayables()
    {
        return $this->hasMany(Payable::class, 'payable_type', 'type_code');
    }

    public function accountsReceivables()
    {
        return $this->hasMany(Recievable::class, 'recievable_type', 'type_code');
    }

    public function planCategories()
    {
        return $this->hasMany(PlanCategories::class, 'category_type', 'type_code');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($types) {
            $types->type_code = self::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        $code = self::max('id') + 1;

        return 'T' . $code;
    }

}


