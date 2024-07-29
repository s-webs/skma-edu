<div>
    <div style="margin-bottom: 15px;">
        <img src="{{ $element->formViewValue($item) ?? null }}" id="custom-ckfinder-upload-img" style="max-width: 300px; border-radius: 8px; border: 3px solid #7843e9"
             alt="">
    </div>
    <div class="custom-ckfinder-upload" id="custom-ckfinder-upload"
         style="display: inline-flex; padding: 10px 30px; background-color: #7843e9; color: #fff; cursor: pointer; border-radius: 7px">
        Выбрать изображение
    </div>
    <input type="hidden" name="{{ $element->name() }}" value="{{ $element->formViewValue($item) ?? '' }}"
           data-id="custom-ckfinder-upload" id="">

    @if(count($errors->get($path = str_replace([']', '['], ['', '.'], 'image')))> 0)
        <ul class="form-element-errors">
            @foreach ($errors->get($path) as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
</div>

<script>
    let btnRu = document.getElementById('custom-ckfinder-upload');
    btnRu.addEventListener('click', e => {
        console.log('CLICK')
        CKFinder.modal({
            chooseFiles: true,
            width: 1000,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    let file = evt.data.files.first();
                    let output = btnRu.parentElement.querySelector('input');
                    output.value = file.getUrl();

                    let image = document.getElementById("custom-ckfinder-upload-img");
                    image.src = output.value;
                });
            }
        });
    })
</script>
