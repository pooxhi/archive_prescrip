<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer',
        'address',
        'reference_number',
        'created_by',
        'prescription_date',
        'right_sphere',
        'right_cylinder',
        'right_axis',
        'right_add',
        'left_sphere',
        'left_cylinder',
        'left_axis',
        'left_add',
        'pd',
        'notes',
        'amount_due',
    ];

    protected function casts(): array
    {
        return [
            'prescription_date' => 'date',
            'right_sphere' => 'decimal:2',
            'right_cylinder' => 'decimal:2',
            'right_add' => 'decimal:2',
            'left_sphere' => 'decimal:2',
            'left_cylinder' => 'decimal:2',
            'left_add' => 'decimal:2',
            'amount_due' => 'decimal:2',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}