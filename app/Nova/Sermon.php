<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Http\Requests\NovaRequest;

class Sermon extends Resource
{
    public static $model = \App\Models\Sermon::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'scripture_reference',
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

            Text::make('Scripture Reference')
                ->sortable()
                ->rules('nullable', 'max:255'),

            DateTime::make('Date')
                ->sortable()
                ->rules('required'),

            Text::make('Video URL')
                ->rules('nullable', 'url', 'max:255'),

            Text::make('Audio URL')
                ->rules('nullable', 'url', 'max:255'),

            Trix::make('Notes')
                ->rules('nullable'),

            BelongsTo::make('Preacher', User::class)
                ->rules('required'),

            Image::make('Thumbnail')
                ->disk('public')
                ->path('sermon-thumbnails')
                ->prunable(),

            Tag::make('Tags')
                ->withMeta(['placeholder' => 'Add tags...'])
                ->rules('nullable'),
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
