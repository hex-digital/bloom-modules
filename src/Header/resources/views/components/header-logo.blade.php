<a href="/" title="Homepage">
  @if ($logo)
    @svg($logo, 'c-header__logo')
  @else
    {!! get_bloginfo('name') !!}
  @endif
</a>
