<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Event extends Resource
{
    public static $model = \App\Models\Event::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'location',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Description')
                ->rules('required'),

            DateTime::make('Start Date')
                ->sortable()
                ->rules('required'),

            DateTime::make('End Date')
                ->sortable()
                ->rules('required'),

            Text::make('Location')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make('Image')
                ->disk('public')
                ->path('event-images')
                ->prunable(),

            Text::make('Registration URL')
                ->rules('nullable', 'url', 'max:255'),

            Boolean::make('Is Recurring')
                ->rules('required'),

            Text::make('Recurrence Pattern')
                ->rules('nullable', 'max:255')
                ->dependsOn(
                    ['is_recurring'],
                    function (Text $field, NovaRequest $request, $formData) {
                        if ($formData->is_recurring) {
                            $field->rules('required');
                        }
                    }
                ),
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
