<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBudgets extends Model
{
    use HasFactory;

    protected $table = 'add_budgets_request';

    protected $fillable = [
        'request_name',
        'request_amount',
        'request_description',
        'request_category',
        'request_type',
        'request_department',
        'request_budget_code',
        'request_actualSpending',
        'request_variance',
        'request_varianceReason',
        'request_status',
        'request_approvedBy',
        'request_approvedDate',
        'request_approvedAmount',
        'request_notes',
    ];

    protected $primaryKey = 'request_code';

    public function category()
    {
        return $this->belongsTo(Categories::class, 'request_category', 'category_code');
    }

    public function type()
    {
        return $this->belongsTo(Types::class, 'request_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'request_department', 'department_code');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'request_status', 'status_code');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'request_approvedBy', 'username');
    }

    public function budget()
    {
        return $this->belongsTo(Budgets::class, 'request_budget_code', 'id');
    }
}
