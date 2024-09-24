@if ($canRenderBlock)

  <x-bloom-stats.row :statsRow="$statsRow" />

@else
  <x-bloom-base.empty-block />
@endif

