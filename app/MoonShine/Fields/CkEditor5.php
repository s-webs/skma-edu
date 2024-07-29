<?php

namespace App\MoonShine\Fields;

use MoonShine\Fields\Field;

class CkEditor5 extends Field
{
    protected static string $view = 'fields.ckeditor5';

    protected array $assets = [
        '/vendor/ckeditor4/ckeditor.js',
        '/js/ckfinder/ckfinder.js'
    ];
}
