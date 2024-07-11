<div class="u-absolute u-left-0 u-w-full u-top-full u-h-4"></div>
<div class="c-header__subnav-container u-absolute u-top-full u-left-0 u-mt-4 u-right-0 u-w-full u-bg-white">
  @foreach($mainNav as $navItem)
    @if($navItem->children)
      <div
        id="c-header__subnav-{{ $navItem->id }}"
        class="c-header__subnav"
        data-subnav-id="{{ $navItem->id }}"
        role="menu"
      >
        @foreach($navItem->children as $subnavItem)
          <a href="{{ $subnavItem->url }}"
             class="c-header__subnav-link c-header__subnav-item"
             tabindex="0"
             role="menuitem"
          >
            {{ $subnavItem->label }}
          </a>
        @endforeach
      </div>
    @endif
  @endforeach
</div>

