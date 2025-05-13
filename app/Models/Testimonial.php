<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'name',
        'content',
        'date',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
    ];
}
