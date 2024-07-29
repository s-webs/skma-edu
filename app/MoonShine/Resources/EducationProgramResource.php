<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\EducationProgram;

use MoonShine\Decorations\Block;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class EducationProgramResource extends Resource
{
    public static string $model = EducationProgram::class;

    public static string $title = 'Образовательные программы';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make([
                Text::make('Название на казахском', 'kk_title'),
                Text::make('Название на русском', 'ru_title'),
                Text::make('Название на английском', 'en_title'),
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
