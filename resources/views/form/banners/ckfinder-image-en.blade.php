<div>
  <label for="custom-ckfinder-upload-en" class="control-label required" style="display: flex">
    Изображение на английском
    <span class="form-element-required">*</span>
  </label>
  <div class="custom-ckfinder-upload" id="custom-ckfinder-upload-en" style="display: inline-flex; padding: 10px 30px; background-color: #3c8dbc; color: #fff; cursor: pointer">Выбрать изображение</div>
  <input type="hidden" name="en_image" value="{{old('en_image') ?? $model->en_image}}" data-id="custom-ckfinder-upload-en" id="">
  <div style="margin-top: 15px;">
    <img src="{{old('en_image') ?? $model->en_image}}" id="custom-ckfinder-upload-en-img" style="max-width: 500px" alt="">
  </div>

  @if(count($errors->get($path = str_replace([']', '['], ['', '.'], 'en_image')))> 0)
    <ul class="form-element-errors">
        @foreach ($errors->get($path) as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
  @endif
</div>

@push('footer-scripts')
  <script>
    let btnEn = document.getElementById('custom-ckfinder-upload-en');
      btnEn.addEventListener('click', e => {
        CKFinder.modal({
          chooseFiles: true,
          width: 1000,
          height: 600,
          onInit: function(finder) {
            finder.on('files:choose', function(evt) {
              let file = evt.data.files.first();
              let output = btnEn.parentElement.querySelector('input');

              if (file.getUrl()[0] === '/') {
                output.value = file.getUrl();
              } else {
                output.value = '/' + file.getUrl();
              }

              let image = document.getElementById("custom-ckfinder-upload-en-img");
              image.src = output.value;
            });
          }
        });
      })
  </script>
@endpush