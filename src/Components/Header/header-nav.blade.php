<nav class="c-header__nav" aria-label="Main navigation" role="navigation">
  <div class="u-relative">
    @if($mainNav)
      <ul class="c-header__nav-items">
        @foreach($mainNav as $navItem)
          @if($navItem->children)
            <li
                id="c-header__nav-item-{{ $navItem->id }}"
                class="c-header__nav-item"
                data-nav-id="{{ $navItem->id }}"
                data-has-subnav="true"
                aria-haspopup="true"
                aria-controls="c-header__subnav-{{ $navItem->id }}"
            >
              <button class="c-header__nav-link">
                {{ $navItem->label }}
              </button>
            </li>
          @else
            <li
                id="c-header__nav-item-{{ $navItem->id }}"
                class="c-header__nav-item"
                data-nav-id="{{ $navItem->id }}"
                aria-expanded="false"
            >
              <a href="{{ $navItem->url }}" class="c-header__nav-link">
                {{ $navItem->label }}
              </a>
            </li>
          @endif
        @endforeach
      </ul>
    @endif
  </div>
</nav>
