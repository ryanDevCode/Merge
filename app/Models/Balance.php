<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'balance_sheet';

    protected $primaryKey = 'balance_code';

    protected $fillable = [
        'balance_info',
        'balance_name',
        'balance_amount',
        'balance_date',
        'balance_type',
        'balance_department',
        'balance_category',
    ];

    protected $dates = ['balance_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'balance_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'balance_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'balance_category', 'plan_category_code');
    }
}
