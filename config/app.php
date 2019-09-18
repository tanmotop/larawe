<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/12
 * Time: 4:30 PM
 */

return [
    'env' => env('APP_ENV', 'production'),

    'debug' => env('APP_DEBUG', false),

    'timezone' => 'Asia/Shanghai',

    'locale' => 'zh-CN',

    'module_name' => env('MODULE_NAME'),

    'providers' => [
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        App\Providers\RouteServiceProvider::class
    ],
];