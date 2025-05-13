<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class NewsletterSubscriber extends Model
{
    use HasFactory, Actionable;

    protected $fillable = [
        'email',
        'name',
        'subscribed_at',
        'status',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'status' => 'boolean',
    ];
}
