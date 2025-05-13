<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Donation extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'amount',
        'donor_name',
        'donor_email',
        'campaign',
        'transaction_id',
        'date',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'datetime',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_COMPLETED,
            self::STATUS_FAILED,
        ];
    }
}
