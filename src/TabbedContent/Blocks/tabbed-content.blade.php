@if ($canRenderBlock)
  <section
    id="{!! $blockAnchor !!}"
    class="c-tabbed-content c-outerblocks {!! $blockClasses !!}"
    x-data="{ activePage: '{!! $tabbedContent[0]["slug"] !!}', content: '' }"
    @update:page="activePage = $event.detail.page"
  >
    <div class="c-tabbed-content__wrapper o-wrapper__bleed tablet-wide:o-wrapper ">
      @if ($navHeading)
        <h6 class="tablet-wide:hidden c-tabbed-content__nav-heading" aria-hidden="true">{{ $navHeading }}</h6>
      @endif
      <div class="c-tabbed-content__nav">
        <div class="c-tabbed-content__nav-wrapper" role="tablist">
          @if ($navHeading)
            <h6 class="hidden tablet-wide:block c-tabbed-content__nav-heading" aria-hidden="true">{{ $navHeading }}</h6>
          @endif
          @foreach($tabbedContent as $navItem)
            <button
              id="tab-{{ $navItem['slug'] }}"
              class="c-tabbed-content__nav-btn"
              data-nav="{{ $navItem['slug'] }}"
              @click="$dispatch('update:page', { page: $el.dataset.nav })"
              @keypress.enter="content = document.querySelector('#tabpanel-{{ $navItem['slug'] }}').innerHTML; document.querySelector('#tabpanel-{{ $navItem['slug'] }}').innerHTML = content; document.querySelector('#tabpanel-{{ $navItem['slug'] }}').focus();"
              :class="activePage == $el.dataset.nav ? 'c-tabbed-content__nav-btn--active' : ''"
              role="tab"
              aria-label="{{ $navItem['label'] }} - Hit enter to find out more."
              :aria-selected="activePage == $el.dataset.nav ? 'true' : 'false'"
              aria-controls="tabpanel-{{ $navItem['slug'] }}"
            >
              <span>{{ $navItem['label'] }}</span>
              <x-icon-arrow class="rotate-90 c-tabbed-content__nav-btn__icon" />
            </button>
            @endforeach
        </div>
      </div>

      <div class="c-tabbed-content__pages" aria-live="polite">
        @foreach($tabbedContent as $content)
          <div
            id="tabpanel-{{ $content['slug'] }}"
            :tabindex="activePage == $el.dataset.content ? '1' : '0'"
            class="c-tabbed-content__page"
            {!! !$loop->first ? 'style="transform: translateX(100%); opacity: 0;"' : '' !!}
            data-content="{{ $content['slug'] }}"
            :class="activePage == $el.dataset.content ? 'c-tabbed-content__page--active' : ''"
            role="tabpanel"
            aria-labelledby="tab-{{ $content['slug'] }}"
            @keydown.escape="document.querySelector('.c-tabbed-content__nav-btn--active').focus(); "
          >
            {!! $content['page'] !!}
          </div>
        @endforeach
      </div>
    </div>
  </section>

@else
  <x-bloom-base.empty-block />
@endif
