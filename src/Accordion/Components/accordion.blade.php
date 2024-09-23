<details
  class="c-accordion {!! $iconRotate ? 'c-accordion--icon-rotate' : '' !!} {!! $mode === 'plus' ? 'c-accordion--mode-plus' : '' !!}"
>
  <summary class="c-accordion__header">
    <span class="c-accordion__title">{!! $title !!}</span>

    <span class="c-accordion__icon-container">
      @if($mode === 'plus')
          @svg('icon-line',  "c-accordion__icon-plus")
          @svg('icon-line',  "c-accordion__icon-plus")
      @else
        @isset($icon)
          @svg('icon-' . $icon,  "c-accordion__icon")
        @endisset
      @endif
    </span>

  </summary>

  <div class="c-accordion__content">
    {{ $slot }}
  </div>
</details>
