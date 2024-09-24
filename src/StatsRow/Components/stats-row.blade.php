<div class="c-stat__block">
  @foreach($statsRow as $stat)
    <div class="c-stat">

      <div class="c-stat__data">

        @if($stat['prefix'])
          <span class="c-stat__prefix">{!! $stat['prefix'] !!}</span>
        @endif

        @if($stat['stat'])
          <span class="c-stat__stat">{!! $stat['stat'] !!}</span>
        @endif

        @if($stat['suffix'])
          <span class="c-stat__suffix">{!! $stat['suffix'] !!}</span>
        @endif

      </div>

      @if($stat['description'])
        <div class="c-stat__description">{!! $stat['description'] !!}</div>
      @endif

    </div>
  @endforeach
</div>
