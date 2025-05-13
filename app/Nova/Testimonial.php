<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Testimonial extends Resource
{
    public static $model = \App\Models\Testimonial::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'content',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Content')
                ->rules('required', 'max:1000'),

            Date::make('Date')
                ->sortable()
                ->rules('required'),

            Image::make('Image')
                ->disk('public')
                ->path('testimonial-images')
                ->prunable(),

            Boolean::make('Is Featured')
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
