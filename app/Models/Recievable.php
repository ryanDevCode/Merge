<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recievable extends Model
{
    use HasFactory;

    protected $table = 'accounts_recievable';

    protected $primaryKey = 'recievable_code';

    protected $fillable = [
        'recievable_info',
        'recievable_name',
        'recievable_invoice_date',
        'recievable_amount',
        'recievable_due_date',
        'recievable_type',
        'recievable_department',
        'recievable_category',
    ];

    protected $dates = ['recievable_invoice_date', 'recievable_due_date'];

    public function type()
    {
        return $this->belongsTo(Types::class, 'recievable_type', 'type_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'recievable_department', 'department_code');
    }

    public function category()
    {
        return $this->belongsTo(PlanCategories::class, 'recievable_category', 'plan_category_code');
    }

}
