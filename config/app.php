<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'locale_dir' => 'ltr',

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Laravel Framework Service Providers...
         */

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,

        /*
         * Attendize Service Providers
         */
        App\Providers\BladeServiceProvider::class,
        App\Providers\HtmlMacroServiceProvider::class,
        App\Providers\HelpersServiceProvider::class,
        Nitmedia\Wkhtml2pdf\L5Wkhtml2pdfServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Markdown' => GrahamCampbell\Markdown\Facades\Markdown::class,
        'PDF' => Nitmedia\Wkhtml2pdf\Facades\Wkhtml2pdf::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Utils' => App\Attendize\Utils::class,
    ])->toArray(),

];
