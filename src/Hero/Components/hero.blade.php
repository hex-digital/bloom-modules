<section
  @if($blockAnchor) id="{{ $blockAnchor }}" @endif
class="c-hero" data-video="{!! $video !!}">

  <x-bloom-base.image :id="$image" class="c-hero__image"/>

  <div class="c-hero__embed">
  </div>

  <div class="c-overlay"></div>

  <div class="o-wrapper">
    <div class="c-hero__content">
      {{ $slot }}
    </div>
  </div>
</section>
