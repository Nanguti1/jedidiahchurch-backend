<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class TeamMember extends Resource
{
    public static $model = \App\Models\TeamMember::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'position',
        'email',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Position')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Bio')
                ->rules('required'),

            Image::make('Image')
                ->disk('public')
                ->path('team-member-images')
                ->prunable(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255'),

            Text::make('Social Links')
                ->rules('nullable')
                ->help('Enter social media links as JSON: {"facebook": "url", "twitter": "url", etc.}'),

            BelongsTo::make('Ministry', Ministry::class)
                ->nullable(),

            BelongsTo::make('User', User::class)
                ->nullable(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
