<a
  {{ $attributes->merge(['class' => 'c-btn ' . $buttonStyle]) }}
  href="{!! esc_url($url) !!}"
  {!! esc_html($target) !!}
>
  {!! esc_html($text) !!}
</a>
