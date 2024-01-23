<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budgets extends Model
{
    use HasFactory;

    protected $table = 'budgets';

    protected $fillable = [
        'budget_name',
        'budget_amount',
        'budget_description',
        'budget_startDate',
        'budget_endDate',
        'budget_category',
        'budget_type',
        'budget_department',
        'budget_status',
        'budget_approvedBy',
        'budget_approvedDate',
        'budget_approvedAmount',
        'budget_notes',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'budget_category', 'category_code');
    }

    public function type()
    {
        return $this->belongsTo(Types::class, 'budget_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'budget_department', 'department_code');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'budget_status', 'status_code');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'budget_approvedBy', 'username');
    }

    public function addBudget()
    {
        return $this->belongsTo(AddBudgets::class, 'request_budget_code', 'id');
    }
}
