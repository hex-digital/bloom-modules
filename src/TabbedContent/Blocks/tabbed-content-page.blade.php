@if ($canRenderBlock)
  <div
    id="{!! $blockAnchor !!}"
    class="{!! 'c-tabbed-content-page ' . $blockClasses !!}"
    data-page="{{ $navLabel }}"
  >
    <InnerBlocks />
  </div>

@else
  <x-bloom-base.empty-block />
@endif

