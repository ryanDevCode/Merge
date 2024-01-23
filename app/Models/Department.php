<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'department_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'department_code', 'department_code');
    }

    public function balances()
    {
        return $this->hasMany(Balance::class, 'balance_department', 'department_code');
    }

    public function inventoryTurnovers()
    {
        return $this->hasMany(Turnover::class, 'turnover_department', 'department_code');
    }

    public function incomeStatements()
    {
        return $this->hasMany(Income::class, 'income_department', 'department_code');
    }

    public function cashflowStatements()
    {
        return $this->hasMany(Cashflow::class, 'cashflow_department', 'department_code');
    }

    public function salesReports()
    {
        return $this->hasMany(Sales::class, 'sales_department', 'department_code');
    }

    public function accountsPayables()
    {
        return $this->hasMany(Payable::class, 'payable_department', 'department_code');
    }

    public function accountsReceivables()
    {
        return $this->hasMany(Recievable::class, 'recievable_department', 'department_code');
    }

    public function budgets()
    {
        return $this->hasMany(Budgets::class, 'budget_department', 'department_code');
    }

    public function addbudgets()
    {
        return $this->hasMany(Addbudgets::class, 'request_department', 'department_code');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($department) {
            $department->department_code = self::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        $code = self::max('id') + 1;

        return '100' . $code;
    }
}
