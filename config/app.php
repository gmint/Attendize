<?php

use Illuminate\Support\Facades\Facade;

return [

    'locale_dir' => 'ltr',

    'aliases' => Facade::defaultAliases()->merge([
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Markdown' => GrahamCampbell\Markdown\Facades\Markdown::class,
        'PDF' => Nitmedia\Wkhtml2pdf\Facades\Wkhtml2pdf::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Utils' => App\Attendize\Utils::class,
    ])->toArray(),

];
