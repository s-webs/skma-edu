<?php

namespace App\MoonShine\Resources;

use App\MoonShine\Fields\CkEditor5;
use App\MoonShine\Fields\PreviewUpload;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Slug;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class NewsResource extends Resource
{
    public static string $model = News::class;

    public static string $title = 'Новости';

    public string $titleField = 'ru_title';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('', [
                Tabs::make([
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title'),
                        CkEditor5::make('Содержание на русском', 'ru_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для русского языка', 'ru_slug')->from('ru_title')
                            ->separator('-')
                            ->unique(),

                    ]),
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        CkEditor5::make('Содержание на казахском', 'kk_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для казахского языка', 'kk_slug')->from('kk_title')
                            ->separator('-')
                            ->unique()
                            ->hideOnIndex(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->hideOnIndex(),
                        CkEditor5::make('Содержание на английском', 'en_content')
                            ->hideOnIndex(),
                        Slug::make('Ссылка для английского языка', 'en_slug')->from('en_title')
                            ->separator('-')
                            ->unique()
                            ->hideOnIndex(),
                    ])
                ]),
                Image::make('Изображение', 'image')
                    ->hideOnForm(),
                SwitchBoolean::make('Публикация', 'published')->default(1),
                Divider::make(),
                PreviewUpload::make('Превью для новости', 'image')
                    ->hideOnIndex()
                    ->hideOnDetail(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return [
            'id',
            'kk_title',
            'ru_title',
            'en_title',
            'kk_slug',
            'ru_slug',
            'en_slug',
        ];
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
