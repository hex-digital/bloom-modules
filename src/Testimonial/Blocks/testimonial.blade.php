@if ($canRenderBlock)
  <x-bloom-testimonial :testimonial="$testimonial" :image="$image" :name="$name" :organisation="$organisation" :alt-override="$alt"/>
@endif
