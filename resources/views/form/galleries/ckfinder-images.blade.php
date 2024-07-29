<div>
  <label for="custom-ckfinder-upload" class="control-label required" style="display: flex">
    Изображения
    <span class="form-element-required">*</span>
  </label>
  <div class="custom-ckfinder-upload" id="custom-ckfinder-upload" style="display: inline-flex; padding: 10px 30px; background-color: #3c8dbc; color: #fff; cursor: pointer">Выбрать изображения</div>
  <input type="hidden" name="images" data-id="custom-ckfinder-upload" id="">
  <div class="custom-ckfinder-upload-img-container" style="margin-top: 15px;">
    <img src="" id="custom-ckfinder-upload-img" style="max-width: 500px" alt="">
  </div>

  @if(count($errors->get($path = str_replace([']', '['], ['', '.'], 'images')))> 0)
    <ul class="form-element-errors">
        @foreach ($errors->get($path) as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
  @endif
</div>

@push('footer-scripts')
  <script>
    let btn = document.getElementById('custom-ckfinder-upload');
      btn.addEventListener('click', e => {
        CKFinder.modal({
          chooseFiles: true,
          width: 1000,
          height: 600,
          onInit: function(finder) {
            finder.on('files:choose', function(evt) {
              let files = evt.data.files;
              let chosenFiles = '';
              files.forEach(function(file, i) {
                let url = '';
                if (file.getUrl()[0] === '/') {
                  url = file.getUrl();
                } else {
                  url = '/' + file.getUrl();
                }

                if (i === 0) {
                  chosenFiles += url;
                } else {
                  chosenFiles += ',' + url;
                }

                let imageContainer = document.querySelector('.custom-ckfinder-upload-img-container');
                imageContainer.innerHTML += `<img src="${file.getUrl()}" id="custom-ckfinder-upload-img" style="max-width: 500px; margin-bottom: 15px" alt="">`;
              });

              let output = btn.parentElement.querySelector('input');
              output.value = chosenFiles;
            });
          }
        });
      })
  </script>
@endpush
