<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'income_statement';

    protected $primaryKey = 'income_code';

    protected $fillable = [
        'income_info',
        'income_name',
        'income_amount',
        'income_date',
        'income_type',
        'income_department',
        'income_category',
    ];

    protected $dates = ['income_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'income_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'income_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'income_category', 'plan_category_code');
    }
}
