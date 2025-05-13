<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Ministry extends Model
{
    use HasFactory, SoftDeletes, Actionable, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'leader_name',
        'meeting_times',
        'contact_email',
        'featured_image',
        'slug',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function programs()
    {
        return $this->hasMany(MinistryProgram::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}
