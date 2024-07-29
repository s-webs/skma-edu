<?php

namespace App\MoonShine\Resources;

use App\Models\Menu;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use MoonShine\Fields\TinyMce;

class TopLeftMenuResource extends TreeResource
{
    public static string $model = Menu::class;

    public static string $title = 'Левое верхнее';

    public string $titleField = 'ru_title';

    public static string $orderField = 'order';

    public function treeKey(): ?string
    {
        return 'parent_id';
    }

    public function sortKey(): string
    {
        return 'order';
    }

    public function query(): Builder
    {
        return parent::query()->where('type', 0);
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('', [
                Tabs::make([
                    Tab::make('KZ', [
                        Text::make('Название на казахском', 'kk_title')
                            ->hideOnIndex(),
                        Text::make('Ссылка для казахского языка', 'kk_link')
                            ->hideOnIndex(),
                    ]),
                    Tab::make('RU', [
                        Text::make('Название на русском', 'ru_title')
                            ->hideOnIndex(),
                        Text::make('Ссылка для русского языка', 'ru_link')
                            ->hideOnIndex(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Название на английском', 'en_title')
                            ->hideOnIndex(),
                        Text::make('Ссылка для английского языка', 'en_link')
                            ->hideOnIndex(),
                    ])
                ]),
                Number::make('Type', 'type')->default(0)->hidden()
            ]),
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
