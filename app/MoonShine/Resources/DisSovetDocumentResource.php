<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\DisSovetDocument;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class DisSovetDocumentResource extends Resource
{
    public static string $model = DisSovetDocument::class;

    public static string $title = 'Документы диссертационного совета';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('Документы диссертационного совета', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        File::make('Файл на казахском', 'kk_file')
                            ->disk('public')
                            ->dir('files/dis_sovet/documents')
                            ->keepOriginalFileName()
                            ->removable()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title')
                            ->hideOnIndex(),
                        File::make('Файл на русском', 'ru_file')
                            ->disk('public')
                            ->dir('files/dis_sovet/documents')
                            ->keepOriginalFileName()
                            ->removable()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->hideOnIndex(),
                        File::make('Файл на английском', 'en_file')
                            ->disk('public')
                            ->dir('files/dis_sovet/documents')
                            ->keepOriginalFileName()
                            ->removable()
                            ->hideOnIndex(),
                    ]),
                ]),
                StackFields::make('Названия')->fields([
                    Text::make('kk_title'),
                    Text::make('ru_title'),
                    Text::make('en_title'),
                ])->hideOnForm()->hideOnDetail(),
                StackFields::make('Ссылки')->fields([
                    File::make('kk_file'),
                    File::make('ru_file'),
                    File::make('en_file'),
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
