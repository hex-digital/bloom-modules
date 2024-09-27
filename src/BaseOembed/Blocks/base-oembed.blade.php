@if ($canRenderBlock)
  <section
    @if($blockAnchor) id="{{ $blockAnchor }}" @endif
    class="{{ $blockClasses }}">
    <div class="c-base-oembed-block__outer">

      @foreach ($baseOembed as $oembed)

        <div class="c-base-oembed-block__inner">

          @if ($oembed['oembed'])
            <div class="c-base-oembed-block__video">
              <x-bloom-base.oembed :acf-o-embed="$oembed['oembed']"/>
            </div>
          @endif

          <div>

            @if ($oembed['heading'])
              <h3 class="c-base-oembed-block__heading">{!! $oembed['heading'] !!}</h3>
            @endif

          </div>

        </div>

      @endforeach

    </div>

  </section>

@else
  <x-bloom-base.empty-block />
@endif

