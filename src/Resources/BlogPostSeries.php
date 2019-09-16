<?php

namespace Metadeck\NovaBlog\Resources;

use Metadeck\Blog\Models\BlogPostSeries as BlogPostSeriesModel;

use Illuminate\Http\Request;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class BlogPostSeries extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = BlogPostSeriesModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title', 'description'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Blog';

    /**
     * The number of resources to show per page via relationships.
     *
     * @var int
     */
    public static $perPageViaRelationship = 20;

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label() {
        return 'Post Series';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            Text::make('Title')
                ->sortable()
                ->rules(['required']),

            Text::make('Description'),

            BelongsToMany::make('Posts', 'posts', BlogPost::class)
                ->fields(function () {
                    return [
                        Number::make('Order'),
                    ];
                }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
