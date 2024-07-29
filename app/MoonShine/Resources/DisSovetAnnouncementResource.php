<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\DisSovetAnnouncement;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\File;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class DisSovetAnnouncementResource extends Resource
{
    public static string $model = DisSovetAnnouncement::class;

    public static string $title = 'Обявления о защитах диссертации';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('Обявления о защитах диссертации', [
                BelongsTo::make('Выбор ОП', 'education_program_id', 'ru_title'),
                Divider::make(),
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на казахском', 'kk_content')
                            ->hideOnIndex()
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title'),
                        TinyMce::make('Содержание на русском', 'ru_content')
                            ->hideOnIndex()
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                        ->hideOnIndex(),
                        TinyMce::make('Содержание на английском', 'en_content')
                        ->hideOnIndex()
                    ]),
                ]),
                File::make('Файлы', 'files')
                    ->disk('public')
                    ->dir('files/dis_sovet/announcements')
                    ->keepOriginalFileName()
                    ->multiple()
                    ->removable()
                    ->hideOnIndex(),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
