<section {{ $attributes->merge(['class' => 'o-wrapper c-outerblocks c-image-content ' . $classes]) }}>

  <div class="c-image-content__image">
    <x-bloom-base.image :id="$image" :alt-override="$alt"/>
  </div>
  <div class="c-image-content__content">
    {!! $slot !!}
  </div>

</section>
