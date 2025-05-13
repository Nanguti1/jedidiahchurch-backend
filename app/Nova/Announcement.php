<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Announcement extends Resource
{
    public static $model = \App\Models\Announcement::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Content')
                ->rules('required'),

            DateTime::make('Start Date')
                ->sortable()
                ->rules('required'),

            DateTime::make('End Date')
                ->sortable()
                ->rules('required'),

            Boolean::make('Is Featured')
                ->rules('required'),

            Text::make('Link')
                ->rules('nullable', 'url', 'max:255'),
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
