<?php

namespace App\MoonShine\Resources;

use App\Models\DisSovetPages;
use Illuminate\Database\Eloquent\Model;
use App\Models\DisSovetPage;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Slug;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class DisSovetPageResource extends Resource
{
    public static string $model = DisSovetPages::class;

    public static string $title = 'Страницы';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('Страницы | Диссертационный совет', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->required()
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на казахском', 'kk_content')
                            ->hideOnIndex(),
                        File::make('Файлы для казахского варианта', 'kk_files')
                            ->disk('public')
                            ->dir('files/dis_sovet/files/kk')
                            ->keepOriginalFileName()
                            ->multiple()
                            ->removable()
                            ->hideOnIndex(),
                        Slug::make('Slug KZ', 'kk_slug')->from('kk_title')->separator('-')->unique()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title')
                            ->required()
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на русском', 'ru_content')
                            ->hideOnIndex(),
                        File::make('Файлы для русского варианта', 'ru_files')
                            ->disk('public')
                            ->dir('files/dis_sovet/files/ru')
                            ->keepOriginalFileName()
                            ->multiple()
                            ->removable()
                            ->hideOnIndex(),
                        Slug::make('Slug RU', 'ru_slug')->from('ru_title')->separator('-')->unique()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->required()
                            ->hideOnIndex(),
                        TinyMce::make('Содержание на английском', 'en_content')
                            ->hideOnIndex(),
                        File::make('Файлы для английского варианта', 'en_files')
                            ->disk('public')
                            ->dir('files/dis_sovet/files/en')
                            ->keepOriginalFileName()
                            ->multiple()
                            ->removable()
                            ->hideOnIndex(),
                        Slug::make('Slug EN', 'en_slug')->from('en_title')->separator('-')->unique()
                            ->hideOnIndex(),
                    ]),
                ]),
                StackFields::make('Названия')->fields([
                    Text::make('kk_title'),
                    Text::make('ru_title'),
                    Text::make('en_title'),
                ])->hideOnForm()->hideOnDetail(),
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
