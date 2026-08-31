<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'is_active',
])]
#[Hidden([
    'password',
    'remember_token',
])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Prescriptions created by this user.
     */
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'created_by');
    }

    /**
     * OCR scans performed by this user.
     */
    public function ocrScans()
    {
        return $this->hasMany(OcrScan::class, 'performed_by');
    }

    /**
     * Activity logs created by this user.
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}