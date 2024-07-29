<div style="margin-top: 30px">
  <label for="custom-ckfinder-upload-1" class="control-label required" style="display: flex">
    Логотип ВУЗа на футере
    <span class="form-element-required">*</span>
  </label>
  <div class="custom-ckfinder-upload" id="custom-ckfinder-upload-1" style="display: inline-flex; padding: 10px 30px; background-color: #3c8dbc; color: #fff; cursor: pointer">Выбрать изображение</div>
  <input type="hidden" name="footer_logo" value="{{old('footer_logo') ?? $model->footer_logo}}" data-id="custom-ckfinder-upload-1" id="">
  <div style="margin-top: 15px;">
    <img src="{{old('footer_logo') ?? $model->footer_logo}}" id="custom-ckfinder-upload-img-1" style="max-width: 500px" alt="">
  </div>

  @if(count($errors->get($path = str_replace([']', '['], ['', '.'], 'footer_logo')))> 0)
    <ul class="form-element-errors">
        @foreach ($errors->get($path) as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
  @endif
</div>

@push('footer-scripts')
  <script>
    btnRu = document.getElementById('custom-ckfinder-upload-1');
      btnRu.addEventListener('click', e => {
        CKFinder.modal({
          chooseFiles: true,
          width: 1000,
          height: 600,
          onInit: function(finder) {
            finder.on('files:choose', function(evt) {
              let file = evt.data.files.first();
              let output = btnRu.parentElement.querySelector('input');
              output.value = file.getUrl();

              let image = document.getElementById("custom-ckfinder-upload-img-1");
              image.src = output.value;
            });
          }
        });
      })
  </script>
@endpush