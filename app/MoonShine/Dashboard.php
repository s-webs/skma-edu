<?php

namespace App\MoonShine;

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Honor;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Metrics\DonutChartMetric;

class Dashboard extends DashboardScreen
{
    public function blocks(): array
    {
        return [
            DashboardBlock::make([
                DonutChartMetric::make('Материалов')
                    ->columnSpan(6)
                    ->values([
                        'Новости' => News::query()->count(),
                        'Страницы' => Page::query()->count(),
                        'Достижения' => Honor::query()->count(),
                        'Слайдеры' => Slider::query()->count(),
                        'Галерея' => Gallery::query()->count(),
                        'Баннеры' => Banner::query()->count(),
                    ]),
            ]),

        ];
    }
}
