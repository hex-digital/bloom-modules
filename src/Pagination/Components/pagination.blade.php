<div class="c-pagination c-pagination--blocks">
  @for($i = 1; $i <= $maxNumPages; $i++)
    <span
      class="c-pagination__page {!! $i == $page ? 'c-pagination__page--current' : '' !!}"
      data-page="{!! $i !!}"
    >
      {!! $i !!}
    </span>
  @endfor
</div>

