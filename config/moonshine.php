<?php

use MoonShine\Exceptions\MoonShineNotFoundException;
use MoonShine\Models\MoonshineUser;

return [
    'dir' => 'app/MoonShine',
    'namespace' => 'App\MoonShine',
    'disk' => env('MOONSHINE_DISK', 'public'),

    'title' => env('MOONSHINE_TITLE', 'Админ-панель SKMA'),
    'logo' => env('MOONSHINE_LOGO', '/img/admin_logo.png'),
    'logo_small' => env('MOONSHINE_LOGO_SMALL'),

    'route' => [
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'crm'),
        'index_route' => env('MOONSHINE_INDEX_ROUTE', 'moonshine.index'),
        'middleware' => ['moonshine'],
        'custom_page_slug' => 'custom_page',
        'notFoundHandler' => MoonShineNotFoundException::class,
    ],
    'use_migrations' => true,
    'use_notifications' => true,
    'auth' => [
        'enable' => true,
        'fields' => [
            'username' => 'email',
            'password' => 'password',
            'name' => 'name',
            'avatar' => 'avatar',
        ],
        'guard' => 'moonshine',
        'guards' => [
            'moonshine' => [
                'driver' => 'session',
                'provider' => 'moonshine',
            ],
        ],
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent',
                'model' => MoonshineUser::class,
            ],
        ],
        'footer' => '',
    ],
    'locales' => [
        'ru',
    ],
    'middlewares' => [],
    'tinymce' => [
//        'file_manager' => 'laravel-filemanager',
//        'file_manager' => 'elfinder',
        'file_manager' => 'ckfinder/browser',
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '6'),
    ],
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
    'header' => null, // blade path
    'footer' => [
        'nav' => [
            'https://s-webs.kz' => 'Вопросы разработчику SKMA V2.0',
        ],
    ],
];
