<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class PrayerRequest extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'name',
        'email',
        'request',
        'is_private',
        'status',
        'submitted_at',
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'submitted_at' => 'datetime',
    ];

    const STATUS_NEW = 'new';
    const STATUS_PRAYING = 'praying';
    const STATUS_ANSWERED = 'answered';

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW,
            self::STATUS_PRAYING,
            self::STATUS_ANSWERED,
        ];
    }
}
