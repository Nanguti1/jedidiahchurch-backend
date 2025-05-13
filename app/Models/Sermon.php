<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Sermon extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'title',
        'description',
        'scripture_reference',
        'date',
        'video_url',
        'audio_url',
        'notes',
        'preacher_id',
        'thumbnail',
        'tags',
    ];

    protected $casts = [
        'date' => 'datetime',
        'tags' => 'array',
    ];

    public function preacher()
    {
        return $this->belongsTo(User::class, 'preacher_id');
    }
}
