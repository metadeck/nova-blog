<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'user_model' => env('NOVA_USER_MODEL', 'App\Nova\User'),

    'content_editor' => env('BLOG_EDITOR_FIELD_TYPE', \Laravel\Nova\Fields\Trix::class)
];
