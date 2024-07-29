<ul style="list-style: none">
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>RU:</strong> 
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a 
      style="display: flex; padding: 10px 0;"
      href="{{$model->ru_link}}"
      target="_blank">
        {{$model->ru_link}}
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>KK:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
        href="{{$model->kk_link}}"
      target="_blank">
        {{$model->kk_link}}
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>EN:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
        href="{{$model->en_link}}"
      target="_blank">
        {{$model->en_link}}
      </a>
  </li>
</ul>