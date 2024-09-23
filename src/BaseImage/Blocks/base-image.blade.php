@if ($canRenderBlock)

  <div class="c-base-image-block">
    <x-bloom-base.image :id="$baseImage" :alt-override="$alt"/>
  </div>

@else
  <x-bloom-base.empty-block />
@endif

