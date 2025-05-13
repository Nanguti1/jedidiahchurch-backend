<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class GalleryImage extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'date',
        'tags',
    ];

    protected $casts = [
        'date' => 'date',
        'tags' => 'array',
    ];
}
