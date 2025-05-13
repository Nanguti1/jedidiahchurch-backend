<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Donation extends Resource
{
    public static $model = \App\Models\Donation::class;

    public static $title = 'donor_name';

    public static $search = [
        'id',
        'donor_name',
        'donor_email',
        'transaction_id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Number::make('Amount')
                ->sortable()
                ->rules('required', 'numeric', 'min:0')
                ->step(0.01),

            Text::make('Donor Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Donor Email')
                ->sortable()
                ->rules('required', 'email', 'max:255'),

            Text::make('Campaign')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Text::make('Transaction ID')
                ->sortable()
                ->rules('required', 'max:255'),

            DateTime::make('Date')
                ->sortable()
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
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
