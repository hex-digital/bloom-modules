@if ($caption)
  <figure {{ $attributes->merge(['class' => 'acf-image']) }}>
@endif

  <img
    class="{!! esc_attr($class) !!}"
    alt="{!! esc_attr($alt) !!}"
    src="{!! esc_url($src) !!}"
    title="{!! esc_attr($title) !!}"
    srcset="{!! esc_attr($srcset) !!}"
    sizes="{!! esc_attr($srcset_sizes) !!}"
  />

@if ($caption)
  <figcaption class="c-fig-caption">{!! esc_html($caption) !!}</figcaption>
  </figure>
@endif
