@if ($canRenderBlock)
  <section
    @if($blockAnchor) id="{{ $blockAnchor }}" @endif
    class="{{ $blockClasses }} {{ $classes }}">

    {{--    HTML here--}}

  </section>

@else
  <x-bloom-base.empty-block />
@endif

