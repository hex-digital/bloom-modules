<div class="c-testimonial">
  <div class="c-testimonial__quote-mark">"</div>

  <div class="c-testimonial__inner">
    @if($testimonial)
      <h2 class="c-testimonial__quote">
        {!! $testimonial !!}
      </h2>
    @endif

    <div class="c-testimonial__content">
      @if($image)
        <div class="c-testimonial__image-outer">
          <x-bloom-base.image class="c-testimonial__image" :id="$image" :alt-overide="$alt"></x-bloom-base.image>
        </div>
      @endif

      <div class="c-testimonial__meta">
        @if($name)
          <h4 class="c-testimonial__name">{!! $name !!}</h4>
        @endif
        @if($organisation)
            <div class="c-testimonial__organisation">{!! $organisation !!}</div>
        @endif
      </div>

    </div>

  </div>
</div>
