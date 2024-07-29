<ul style="list-style: none">
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>RU:</strong> 
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a 
      style="display: flex; padding: 10px 0;"
      @if ($model->external)
        href="{{$model->ru_link ? $model->ru_link : $model->ru_slug}}"
      @else
        href="{{$model->ru_link ? url('') . '/' . $model->ru_link : url('') . '/ru/' . $model->ru_slug}}"
      @endif
      target="_blank">
      @if ($model->external)
        {{$model->ru_link ? $model->ru_link : $model->ru_slug}}
      @else
        {{$model->ru_link ? url('') . '/' . $model->ru_link : url('') . '/ru/' . $model->ru_slug}}
      @endif
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>KK:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
      @if ($model->external)
        href="{{$model->kk_link ? $model->kk_link : $model->kk_slug}}"
      @else
        href="{{$model->kk_link ? url('') . '/' . $model->kk_link : url('') . '/kk/' . $model->kk_slug}}"
      @endif 
      target="_blank">
      @if ($model->external)
        {{$model->kk_link ? $model->kk_link : $model->kk_slug}}
      @else
        {{$model->kk_link ? url('') . '/' . $model->kk_link : url('') . '/kk/' . $model->kk_slug}}  
      @endif
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>EN:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
      @if ($model->external)
        href="{{$model->en_link ? $model->en_link : $model->en_slug}}"
      @else
        href="{{$model->en_link ? url('') . '/' . $model->en_link : url('') . '/en/' . $model->en_slug}}"
      @endif 
      target="_blank">
      @if ($model->external)
        {{$model->en_link ? $model->en_link : $model->en_slug}}
      @else
        {{$model->en_link ? url('') . '/' . $model->en_link : url('') . '/en/' . $model->en_slug}}
      @endif
      </a>
  </li>
</ul>