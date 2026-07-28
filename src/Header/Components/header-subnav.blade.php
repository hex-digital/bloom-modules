<div class="absolute left-0 w-full top-full h-4"></div>
<div class="c-header__subnav-container absolute top-full left-0 mt-4 right-0 w-full bg-white">
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

