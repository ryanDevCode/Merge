<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCategories extends Model
{
    use HasFactory;

    protected $table = "plan_categories";

    protected $fillable = [
        'category_type',
        'plan_category_code',
        'plan_category_name',
    ];

    public function type()
    {
        return $this->belongsTo(Types::class, 'category_type', 'type_code');
    }

    public function balances()
    {
        return $this->hasMany(Balance::class, 'balance_category', 'plan_category_code');
    }

    public function inventoryTurnovers()
    {
        return $this->hasMany(Turnover::class, 'turnover_category', 'plan_category_code');
    }

    public function incomeStatements()
    {
        return $this->hasMany(Income::class, 'income_category', 'plan_category_code');
    }

    public function cashflowStatements()
    {
        return $this->hasMany(Cashflow::class, 'cashflow_category', 'plan_category_code');
    }

    public function salesReports()
    {
        return $this->hasMany(Sales::class, 'sales_category', 'plan_category_code');
    }

    public function accountsPayables()
    {
        return $this->hasMany(Payable::class, 'payable_category', 'plan_category_code');
    }

    public function accountsReceivables()
    {
        return $this->hasMany(Recievable::class, 'recievable_category', 'plan_category_code');
    }
}
