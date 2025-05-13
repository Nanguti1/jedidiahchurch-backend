<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    public static $model = \App\Models\Page::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'slug',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')
                ->onlyOnDetail(),

            Trix::make('Content')
                ->rules('required'),

            Text::make('Meta Description')
                ->rules('nullable', 'max:255'),

            Image::make('Featured Image')
                ->disk('public')
                ->path('page-images')
                ->prunable(),

            Boolean::make('Is Published')
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
