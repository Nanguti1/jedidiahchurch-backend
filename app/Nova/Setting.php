<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;

class Setting extends Resource
{
    public static $model = \App\Models\Setting::class;

    public static $title = 'key';

    public static $search = [
        'id',
        'key',
        'group',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Key')
                ->sortable()
                ->rules('required', 'max:255'),

            Code::make('Value')
                ->json()
                ->rules('required'),

            Text::make('Group')
                ->sortable()
                ->rules('required', 'max:255'),
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
