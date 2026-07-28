<section {{ $attributes->merge(['class' => 'o-wrapper__bleed relative ' . $classes]) }}>
  @if($image)
    <div class="c-basic-hero__image">
      <x-bloom-base.image :id="$image" />
    </div>
    <div class="c-basic-hero__shim">
    </div>
  @endif

  <div class="o-wrapper c-basic-hero">
    <div class="c-basic-hero__content">
      {{ $slot }}
    </div>
  </div>
</section>

