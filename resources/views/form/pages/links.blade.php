<ul style="list-style: none">
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>RU:</strong> 
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a 
      style="display: flex; padding: 10px 0;"
        href="{{url('') . '/ru/pages/' . $model->ru_slug}}"
      target="_blank">
        {{url('') . '/ru/pages/' . $model->ru_slug}}
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>KK:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
        href="{{url('') . '/kk/pages/' . $model->kk_slug}}"
      target="_blank">
        {{url('') . '/kk/pages/' . $model->kk_slug}}
      </a>
  </li>
  <li style="border-bottom: 1px solid #000">
    <div style="display: flex; flex-direction: column">
      <strong>EN:</strong>
      <strong style="cursor: pointer" onclick="copyToClipboard(this.parentElement.parentElement.querySelector('a').textContent.trim())">Копировать URL</strong>
    </div> 
    <a
      style="display: flex; padding: 10px 0;"
        href="{{url('') . '/en/pages/' . $model->en_slug}}"
      target="_blank">
        {{url('') . '/en/pages/' . $model->en_slug}}
      </a>
  </li>
</ul>