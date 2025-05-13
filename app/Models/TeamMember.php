<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class TeamMember extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'name',
        'position',
        'bio',
        'image',
        'email',
        'social_links',
        'ministry_id',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
