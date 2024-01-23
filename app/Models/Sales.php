<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales_report';

    protected $primaryKey = 'sales_code';

    protected $fillable = [
        'sales_info',
        'sales_product_name',
        'sales_revenue',
        'sales_date',
        'sales_type',
        'sales_department',
        'sales_category',
    ];

    protected $dates = ['sales_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'sales_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'sales_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'sales_category', 'plan_category_code');
    }
}
