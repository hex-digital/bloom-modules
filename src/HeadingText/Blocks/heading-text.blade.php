@if ($canRenderBlock)

  <x-bloom-heading.text :heading="$heading" :text="$text" />

@else
  <x-bloom-base.empty-block />
@endif

