@if ($canRenderBlock)

  <div class="c-full-width-image-block o-wrapper__bleed">
    <x-bloom-base.image :id="$fullWidthImage" :alt-override="$alt"/>
  </div>

@else
  <x-bloom-base.empty-block />
@endif

