<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContactSubmission extends Resource
{
    public static $model = \App\Models\ContactSubmission::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'email',
        'phone',
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

            Text::make('Phone')
                ->rules('nullable', 'max:255'),

            Trix::make('Message')
                ->rules('required'),

            DateTime::make('Date Submitted')
                ->sortable()
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'pending' => 'Pending',
                    'reviewed' => 'Reviewed',
                    'resolved' => 'Resolved',
                ])
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
