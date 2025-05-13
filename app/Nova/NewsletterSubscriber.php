<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class NewsletterSubscriber extends Resource
{
    public static $model = \App\Models\NewsletterSubscriber::class;

    public static $title = 'email';

    public static $search = [
        'id',
        'email',
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:255'),

            Text::make('Name')
                ->sortable()
                ->rules('nullable', 'max:255'),

            DateTime::make('Subscribed At')
                ->sortable()
                ->rules('required'),

            Boolean::make('Status')
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
