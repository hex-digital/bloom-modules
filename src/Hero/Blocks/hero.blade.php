@if ($canRenderBlock)
  <x-bloom-hero
    :anchor="$blockAnchor"
    :video="$video"
    :image="$image"
  >

    <InnerBlocks
      class="c-innerblocks c-hero__innerblocks"
      template="{!! $innerBlocksTemplate !!}"
    />

  </x-bloom-hero>

@else
  <x-bloom-base.empty-block />
@endif

