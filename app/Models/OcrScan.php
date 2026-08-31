<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcrScan extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'performed_by',
        'source',
        'status',
        'confidence',
        'processing_time_ms',
        'error_message',
        'processed_at',
    ];

    protected function casts(): array
    {
        return [
            'confidence' => 'decimal:2',
            'processed_at' => 'datetime',
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function performer()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}