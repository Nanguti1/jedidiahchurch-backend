<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Http\Requests\NovaRequest;

class GalleryImage extends Resource
{
    public static $model = \App\Models\GalleryImage::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'category',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Description')
                ->rules('nullable', 'max:1000'),

            Image::make('Image Path')
                ->disk('public')
                ->path('gallery-images')
                ->prunable()
                ->rules('required'),

            Text::make('Category')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Date')
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