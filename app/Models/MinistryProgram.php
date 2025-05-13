<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class MinistryProgram extends Model
{
    use HasFactory, SoftDeletes, Actionable;

    protected $fillable = [
        'title',
        'description',
        'ministry_id',
        'icon',
        'color',
    ];

    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }
}
