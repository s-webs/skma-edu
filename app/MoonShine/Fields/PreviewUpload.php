<?php

namespace App\MoonShine\Fields;

use MoonShine\Fields\Field;

class PreviewUpload extends Field
{
    protected static string $view = 'fields.preview-upload';

    protected array $assets = [
        '\js\ckfinder\ckfinder.js'
    ];
}
