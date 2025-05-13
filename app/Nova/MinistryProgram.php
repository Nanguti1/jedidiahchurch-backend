<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class MinistryProgram extends Resource
{
    public static $model = \App\Models\MinistryProgram::class;

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

            Trix::make('Description')
                ->rules('required'),

            BelongsTo::make('Ministry', Ministry::class)
                ->rules('required'),

            Text::make('Icon')
                ->rules('nullable', 'max:255'),

            Text::make('Color')
                ->rules('nullable', 'max:255'),
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
