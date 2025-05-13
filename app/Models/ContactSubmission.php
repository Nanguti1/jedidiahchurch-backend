<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class ContactSubmission extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'date_submitted',
        'status',
    ];

    protected $casts = [
        'date_submitted' => 'datetime',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_REVIEWED = 'reviewed';
    const STATUS_RESOLVED = 'resolved';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_REVIEWED,
            self::STATUS_RESOLVED,
        ];
    }
}
