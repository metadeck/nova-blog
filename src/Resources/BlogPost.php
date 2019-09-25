<?php

namespace Metadeck\NovaBlog\Resources;

use Arsenaltech\NovaTab\NovaTab;
use Arsenaltech\NovaTab\Tabs;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Metadeck\Blog\Models\BlogPost as BlogPostModel;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;

use Advoor\NovaEditorJs\NovaEditorJs;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Spatie\TagsField\Tags;


class BlogPost extends Resource
{

    use Tabs;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = BlogPostModel::class;

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
        'title',
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
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            new NovaTab('Content', [
                Textarea::make('Summary')
                    ->hideFromIndex(),

                NovaEditorJs::make('Body')
                    ->rules(['required']),
            ]),

            new NovaTab('Details', [
                ID::make()
                    ->sortable(),

                TextWithSlug::make('Title')
                    ->slug('slug')
                    ->sortable()
                    ->rules(['required']),

                Slug::make('Slug')
                    ->disableAutoUpdateWhenUpdating(),

                BelongsTo::make('Category', 'category', BlogCategory::class)
                    ->rules(['required']),

                BelongsTo::make('Author', 'author', config('nova-blog.user_model'))
                    ->sortable()
                    ->rules(['required']),
            ]),

            new NovaTab('Media', [
                Images::make('Featured Image', 'featured_image')
                    ->conversionOnIndexView('thumb')
                    ->croppingConfigs(['ratio' => 16/9]),
            ]),

            new NovaTab('SEO', [
                Text::make('SEO Title', 'seo_title'),

                Textarea::make('SEO Description', 'seo_description'),

                Tags::make('Tags'),
            ]),

            new NovaTab('Publishing', [

                Boolean::make('Featured')
                    ->sortable(),

                DateTime::make('Scheduled For')
                    ->format('DD MMM YYYY hh:mm'),
            ]),

            // Read only computed field
            Boolean::make('Published')
                ->exceptOnForms(),
//            Select::make('Content Type', 'content_type')->options([
//                'markdown' => 'Markdown',
//                'editor-js' => 'Editor JS',
//            ])->displayUsingLabels(),
//
//            Markdown::make('Body')
//                ->rules(['required']),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
