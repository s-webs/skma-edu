<x-moonshine::form.textarea
    :attributes="$element->attributes()->merge([
        'id' => 'ckeditor_' . $item->getKey() . '_' . $element->id(),
        'name' => $element->name()
    ])"
>{!! $element->formViewValue($item) ?? '' !!}</x-moonshine::form.textarea>

<script>
    CKEDITOR.replace('ckeditor_{{ $item->getKey() }}_{{ $element->id() }}', {
        height: 450
    });
    CKFinder.setupCKEditor();
</script>
