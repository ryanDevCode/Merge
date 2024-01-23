<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    protected $table = 'cashflow_statement';

    protected $primaryKey = 'cashflow_code';

    protected $fillable = [
        'cashflow_info',
        'cashflow_name',
        'cashflow_amount',
        'cashflow_date',
        'cashflow_type',
        'cashflow_department',
        'cashflow_category',
    ];

    protected $dates = ['cashflow_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'cashflow_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'cashflow_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'cashflow_category', 'plan_category_code');
    }
}
