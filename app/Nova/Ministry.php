<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Ministry extends Resource
{
    public static $model = \App\Models\Ministry::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'leader_name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Description')
                ->rules('required'),

            Text::make('Leader Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Meeting Times')
                ->rules('required', 'max:255'),

            Text::make('Contact Email')
                ->rules('required', 'email', 'max:255'),

            Image::make('Featured Image')
                ->disk('public')
                ->path('ministry-images')
                ->prunable(),

            Text::make('Slug')
                ->onlyOnDetail(),

            HasMany::make('Programs', 'App\Nova\MinistryProgram'),
            HasMany::make('Team Members', 'App\Nova\TeamMember'),
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