<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class PrayerRequest extends Resource
{
    public static $model = \App\Models\PrayerRequest::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'email',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255'),

            Trix::make('Request')
                ->rules('required'),

            Boolean::make('Is Private')
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'new' => 'New',
                    'praying' => 'Praying',
                    'answered' => 'Answered',
                ])
                ->sortable()
                ->rules('required'),

            DateTime::make('Submitted At')
                ->sortable()
                ->rules('required'),
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
