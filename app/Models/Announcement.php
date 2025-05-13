<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Announcement extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'title',
        'content',
        'start_date',
        'end_date',
        'is_featured',
        'link',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
    ];
}
