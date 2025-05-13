<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Event extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'image',
        'registration_url',
        'is_recurring',
        'recurrence_pattern',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_recurring' => 'boolean',
    ];
}
