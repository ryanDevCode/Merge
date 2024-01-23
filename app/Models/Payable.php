<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    use HasFactory;

    protected $table = 'accounts_payable';

    protected $primaryKey = 'payable_code';

    protected $fillable = [
        'payable_info',
        'payable_name',
        'payable_amount',
        'payable_date',
        'payable_type',
        'payable_department',
        'payable_category',
    ];

    protected $dates = ['payable_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'payable_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'payable_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'payable_category', 'plan_category_code');
    }
}
